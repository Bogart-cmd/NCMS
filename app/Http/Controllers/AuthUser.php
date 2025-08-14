<?php

namespace App\Http\Controllers;

use App\Models\Programs;
use App\Models\Students;
use App\Models\User_info;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthUser extends Controller
{
    public function index(){
        return view("login");
    }

    //logic for login function
    public function loginAction(Request $request){
        $data = $request->validate([
            "username"=> ["required"],
            "password"=> ["required"]
        ]);

        // echo Hash::make($data['password']);

        $user = User_info::where('username', $data['username'])->first();

        // Block second login for admin if an active session already exists
        if ($user && $user->usertype === 'admin' && config('session.driver') === 'database') {
            $lifetimeMinutes = (int) config('session.lifetime', 120);
            $activeSince = Carbon::now()->subMinutes($lifetimeMinutes)->timestamp;

            $hasActiveSession = DB::table('sessions')
                ->where('user_id', $user->id)
                ->where('last_activity', '>', $activeSince)
                ->exists();

            if ($hasActiveSession) {
                return back()->with('invalid', 'This admin account is already logged in on another device. Please log out there first.');
            }
        }
        if ($user && Auth::attempt([
            'username' => $data['username'],
            'password' => $data['password']
        ])) {
            $request->session()->regenerate();
            // Redirect to respective pages by user type
            if (auth()->user()->usertype == "staff") {
                return redirect()->route('staff')->with('success', 'Welcome staff');
            } elseif (auth()->user()->usertype == 'admin') {
                return redirect()->route('admin')->with('success', 'Welcome admin');
            } elseif (auth()->user()->usertype == 'officer') {
                return redirect()->route('officer')->with('success', 'Welcome officer');
            }
        }

        return back()->with('invalid', 'Invalid credentials!');
    }
    public function admin(){
        //bar
        $total_student = Students::count();
        $totalNewStudent = Students::whereBetween('updated_at', [Carbon::now()->subDays(7), Carbon::now()])->count();
        $total_pending = Students::where('status','=',0)->count();

        // Program distribution (all students, aligned with all programs)
        $countsByProgramId = Students::select('id_program', DB::raw('count(*) as total_count'))
            ->groupBy('id_program')
            ->pluck('total_count', 'id_program');

        $labels_course = [];
        $values_course = [];
        $programs = Programs::orderBy('name', 'asc')->get();
        foreach ($programs as $program) {
            $labels_course[] = $program->name;
            $values_course[] = (int) ($countsByProgramId[$program->id] ?? 0);
        }

        //doughnut
        $genders = Students::groupBy('gender')->select(DB::raw('gender, count(*) as total_gender'))->get();
        $labels_gender = array('Male', 'Female');
        $values_gender = array(0, 0);
        foreach($genders as $gender){
            if($gender->gender==='Male'){
                $values_gender[0] = $gender->total_gender;
            }elseif($gender->gender === 'Female'){
                $values_gender[1] = $gender->total_gender;
            }
        }

        //horizontal-bar
        $age_datas = Students::select(DB::raw('birthdate'))
            ->whereNotNull('birthdate')
            ->get();
        $age_counts = [];
        foreach ($age_datas as $age_data) {
            $age = (int) $this->get_age($age_data->birthdate);
            if ($age < 0 || $age > 120) { continue; }
            if (!isset($age_counts[$age])) { $age_counts[$age] = 0; }
            $age_counts[$age]++;
        }
        ksort($age_counts, SORT_NUMERIC);
        $labels_age_key = array_keys($age_counts);
        $values_age = array_values($age_counts);

        //line
        $data_months = Students::groupBy('created_month')->select(DB::raw('count(*) as total_applicant, extract(MONTH from created_at) as created_month'))->orderBy("created_month",'ASC')->get();
        $months = array(
            'Jan.',
            'Feb.',
            'March',
            'Apr.',
            'May',
            'June',
            'July',
            'Aug.',
            'Sept.',
            'Oct.',
            'Nov.',
            'Dec.',
        );

        $data_month_labels = array();
        $data_month_values = array();
        foreach($data_months as $data_month){
            $data_month_labels[] = $months[$data_month->created_month-1];
            $data_month_values[] = $data_month->total_applicant;
        }

        // Student Origins Chart - Group by region
        $student_origins = Students::groupBy('region')
            ->select(DB::raw('region, count(*) as total_students'))
            ->orderBy('total_students', 'desc')
            ->limit(10)
            ->get();
        
        $origins_labels = array();
        $origins_values = array();
        foreach($student_origins as $origin){
            $origins_labels[] = $origin->region ?: 'Unknown';
            $origins_values[] = $origin->total_students;
        }

        // Student Origins by Province Chart
        $student_provinces = Students::groupBy('province')
            ->select(DB::raw('province, count(*) as total_students'))
            ->orderBy('total_students', 'desc')
            ->limit(15)
            ->get();
        
        // Debug logging
        \Log::info('Student Provinces Query Result:', $student_provinces->toArray());
        
        $provinces_labels = array();
        $provinces_values = array();
        foreach($student_provinces as $province){
            $province_name = $province->province ?: 'Unknown';
            if (empty(trim($province_name))) {
                $province_name = 'Unknown';
            }
            $provinces_labels[] = $province_name;
            $provinces_values[] = $province->total_students;
        }
        
        // If no province data, show a default message
        if (empty($provinces_labels)) {
            $provinces_labels = ['No Province Data'];
            $provinces_values = [1];
        }

        // Student Origins by City Chart
        // First, let's check what cities we have in the database
        $total_students_check = Students::count();
        \Log::info('Total students in database:', ['count' => $total_students_check]);
        
        $all_cities = Students::select('city')->distinct()->get();
        \Log::info('All distinct cities in database:', $all_cities->pluck('city')->toArray());
        
        $student_cities = Students::groupBy('city')
            ->select(DB::raw('city, count(*) as total_students'))
            ->orderBy('total_students', 'desc')
            ->limit(20)
            ->get();
        
        $cities_labels = array();
        $cities_values = array();
        foreach($student_cities as $city){
            $city_name = $city->city ?: 'Unknown';
            if (empty(trim($city_name))) {
                $city_name = 'Unknown';
            }
            $cities_labels[] = $city_name;
            $cities_values[] = $city->total_students;
        }
        
        // If no city data, show a default message
        if (empty($cities_labels)) {
            $cities_labels = ['No City Data'];
            $cities_values = [1];
        }

        return view('pages.admin', [
            'total_student'=>$total_student,
            'totalNewStudent'=>$totalNewStudent,
            'total_pending'=>$total_pending,
            'values_course'=>$values_course,
            'labels_course'=>$labels_course,
            'labels_gender'=>$labels_gender,
            'values_gender'=>$values_gender,
            'values_age'=>$values_age,
            'labels_age'=>$labels_age_key,
            'data_month_labels'=>$data_month_labels,
            'data_month_values'=>$data_month_values,
            'origins_labels'=>$origins_labels,
            'origins_values'=>$origins_values,
            'provinces_labels'=>$provinces_labels,
            'provinces_values'=>$provinces_values,
            'cities_labels'=>$cities_labels,
            'cities_values'=>$cities_values
        ]);
    }
    //get the age by the birthdate in current date
    public function get_age($birthdate){
        $date=date_create($birthdate);
        $birthdate = date_format($date,"m/d/Y");
        $birthDate = explode("/", $birthdate);
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));
        return $age;
    }

    //graph for staff dashboard
    public function staff(){

        $total_student = Students::count(); //total of all student
        $totalNewStudent = Students::whereBetween('updated_at', [Carbon::now()->subDays(7), Carbon::now()])->count(); //get all new user
        $total_pending = Students::where('status','=',0)->count(); //total of pending student
        $data_graphs = Students::groupBy('id_program')->select(DB::raw('id_program, count(*) as total_program'))->get(); //get total count by course
        $data_labels = array();
        $data_values = array();
        foreach($data_graphs as $data_graph){
            $data_labels[] = $data_graph->program->name;
            $data_values[] = $data_graph->total_course;
        }
        return view('pages.officer', [
            'total_student'=>$total_student,
            'totalNewStudent'=>$totalNewStudent,
            'total_pending'=>$total_pending,
            'data_labels'=>$data_labels,
            'data_values'=>$data_values
        ])->with('success','Welcome Officer');

    }
    //goto officer content
    public function officer(){
        return redirect('/intro-images')->with('success','Welcome Officer');
    }
    //logout session
    public function signoutAction(Request $request){
        $currentSessionId = $request->session()->getId();
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if (config('session.driver') === 'database' && !empty($currentSessionId)) {
            DB::table('sessions')->where('id', $currentSessionId)->delete();
        }
        return redirect('/login-user')->with('logout','Logout Success');
    }

}
