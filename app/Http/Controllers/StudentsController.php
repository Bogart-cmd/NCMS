<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Parents;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\PusherBroadcast;
use App\Models\Programs;

class StudentsController extends Controller
{
    public function registerStudent(Request $request){

        $data = $request->validate([ //data validation
           "course"=> 'required',
           'lname'=> 'required',
           'fname'=> 'required',
           'mname'=> 'required',
           'suffix'=> 'required',
           'number-street'=> 'required',
           'region'=> 'required',
           'province'=> 'required',
           'city-municipality'=> 'required',
           'district'=>'required',
           'zip'=> 'required|numeric',
           'pnumber-street'=> 'required',
           'pregion'=> 'required',
           'pprovince'=> 'required',
           'pcity-municipality'=> 'required',
           'pdistrict'=>'required',
           'pzip'=> 'required|numeric',
            'nationality'=> 'required',
            'contact-number'=> 'required|numeric|digits:11',
            'email'=> 'required|email',
            'gender'=> 'required',
            'civil-status'=> 'required',
            'employement'=> 'required',
            'birthdate'=> 'required|before:today|date',
            'birthplace-region'=> 'required',
            'birthplace-province'=> 'required',
            'birthplace-pcity-municipality'=> 'required',
            'trainee'=> 'required',
            'plname'=> 'required',
            'pfname'=> 'required',
            'pmname'=> 'required',
            'psname'=> 'required',
            'pcontact'=> 'required|numeric|digits:11',
            'classification'=> 'required|array|min:1',
        ]);
        $programs = Programs::all();
        return view('students.register_review',['data'=> $data, 'programs'=>$programs]);
    }

    public function submit_data(Request $request) {
        $data = $request->validate([
            "course"            => 'required|numeric',
            'lname'             => 'required',
            'fname'             => 'required',
            'mname'             => 'required',
            'suffix'            => 'required',
            'number-street'     => 'required',
            'region'            => 'required',
            'province'          => 'required',
            'city-municipality' => 'required',
            'district'          => 'required',
            'zip'               => 'required|numeric',
            'pnumber-street'    => 'required',
            'pregion'           => 'required',
            'pprovince'         => 'required',
            'pcity-municipality'=> 'required',
            'pdistrict'         => 'required',
            'pzip'              => 'required|numeric',
            'nationality'       => 'required',
            'contact-number'    => 'required|numeric|digits:11',
            'email'             => 'required|email',
            'gender'            => 'required',
            'civil-status'      => 'required',
            'employement'       => 'required',
            'birthdate'         => 'required|before:today|date',
            'birthplace-region' => 'required',
            'birthplace-province'=> 'required',
            'birthplace-pcity-municipality'=> 'req  uired',
            'trainee'           => 'required',
            'plname'            => 'required',
            'pfname'            => 'required',
            'pmname'            => 'required',
            'psname'            => 'required',
            'pcontact'          => 'required|numeric|digits:11',
            'classification'    => 'required|array|min:1',
        ]);
    
        // Check if student already has an entry for this course
        $existingStudent = Students::whereRaw('LOWER(fname) = ? AND LOWER(mname) = ? AND LOWER(lname) = ? AND id_course = ?', [
            strtolower($data['fname']),
            strtolower($data['mname']),
            strtolower($data['lname']),
            $data['course']
        ])->select('status')->first();
    
        if ($existingStudent) { // check for status of existing entry. else, submit
            if ((int)$existingStudent->status === 1) { //accepted
                session()->flash('modalMessage', 'You already have an application for this program and cannot reapply.<br>
                NOTE: If you dropped from this program, you can only apply to other programs');
                return back();
            } elseif ((int)$existingStudent->status === 0) { //pending
                session()->flash('modalMessage', 'You already have a pending entry for this program.');
                return back();
            } elseif ((int)$existingStudent->status === 2) { // declined
                session([
                    'reapply_fname' => $data['fname'],
                    'reapply_mname' => $data['mname'],
                    'reapply_lname' => $data['lname'],
                    'reapply_course' => $data['course'],
                ]);
                return redirect('/reapply');
            }
        }
    
        // Proceed with registration
        $student = [
            'id_course'     => (int)$data['course'],
            'fname'         => strtolower($data['fname']),
            'lname'         => strtolower($data['lname']),
            'mname'         => strtolower($data['mname']),
            'sname'         => strtolower($data['suffix']),
            'street_number' => $data['number-street'],
            'city'          => $data['city-municipality'],
            'district'      => $data['district'],
            'zipcode'       => $data['zip'],
            'email'         => $data['email'],
            'gender'        => $data['gender'],
            'civil_status'  => $data['civil-status'],
            'employment'    => $data['employement'],
            'birthdate'     => $data['birthdate'],
            'nationality'   => $data['nationality'],
            'contact_number'=> $data['contact-number'],
            'birthplace'    => $data['birthplace-pcity-municipality'],
            'education'     => $data['trainee'],
            'region'        => $data['region'],
            'province'      => $data['province'],
            'status'        => '0', // Default status
        ];
    
        $newStudent = Students::create($student);
        
        $parents = [
            'students_id' => $newStudent->id,
            'plname' => $data['plname'],
            'pfname' => $data['pfname'],
            'pmname' => $data['pmname'],
            'psname' => $data['psname'],
            'pcontact_number' => $data['pcontact'],
            'pstreet_number' => $data['pnumber-street'],
            'pmunicipality' => $data['pcity-municipality'],
            'pdistrict' => $data['pdistrict'],
            'pzipcode' => $data['zip']
        ];
        Parents::create($parents);
    
        foreach($data['classification'] as $classification){
            Classification::create([
                'students_id' => $newStudent->id,
                'classification_data' => $classification
            ]);
        }
    
        event(new PusherBroadcast('Applicant name: ' . $student['fname']));
    
        return redirect("/thank_you");
    }    

     public function showRegistrationForm() {
        // Return the registration view (with an empty form, for example)
        $programs = Programs::all();
        return view('students.register', compact('programs'));
    }

    public function reapply(Request $request)
    {
        $student = Students::whereRaw('LOWER(fname) = ? AND LOWER(mname) = ? AND LOWER(lname) = ? AND id_course = ?', [
            strtolower(session('reapply_fname')),
            strtolower(session('reapply_mname')),
            strtolower(session('reapply_lname')),
            session('reapply_course')
        ])->first();
    
        if (!$student) {
            return back()->withErrors(['error' => 'Student record not found.']);
        }
    
        if ($student->status !== 2) {
            return back()->withErrors(['error' => 'You can only reapply if your application was declined.']);
        }
    
        $cooldownPeriod = now()->subDays(7);
        if ($student->updated_at > $cooldownPeriod) {
            $remainingTime = $student->updated_at->addDays(7)->diffForHumans();
            return back()->withErrors(['error' => "You can reapply in $remainingTime."]);
        }
    
        $student->update(['status' => 0]);
    
        session()->forget(['reapply_fname', 'reapply_mname', 'reapply_lname', 'reapply_course']);
    
        return back()->with('success', 'Your reapplication has been submitted successfully.');
    }
    
}


