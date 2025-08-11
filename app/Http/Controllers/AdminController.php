<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User_info;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use App\Mail\Sendemail;
use App\Models\Benefits;
use App\Models\Classification;
use App\Models\Competencies;
use App\Models\Contents;
use App\Models\Images;
use App\Models\IntroImage;
use App\Models\Programs;
use App\Models\Qualifications;
use App\Models\ScoreCard;
use App\Models\Updates;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Exports\StudentsExport;
use App\Exports\FilterExport;
use App\Models\Partners;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //goto setting pages
    public function settings(){
        $id = auth()->user()->id;
        $adminData = User_info::find($id);
        return view("pages.adminSetting", ["dataAdmin"=> $adminData]);
    }

    //goto resgister student

    public function register_student(){
        $students = Students::orderBy('id', 'desc')->paginate(10);
        $programs = Programs::all();
        return view("pages.adminRegisterStudent", ['students'=>$students, 'programs'=>$programs, 'isAll'=>true]);
    }

    //filter student data list

    public function filter(Request $request){
        $filter = $request->validate([
            'course'=>['required'],
            'status'=>['required'],
            'start_date'=>['required','date'],
            'end_date'=>['required', 'date']
        ]);
        $start_date = date('Y-m-d H:i:s',strtotime($filter['start_date']));
        $end_date = date('Y-m-d H:i:s',strtotime($filter['end_date']));
        $students = Students::where('id_course','=',$filter['course'])->where('status','=',(int)$filter['status'])->whereBetween('created_at',[$start_date, $end_date])->paginate(10);
        $programs = Programs::all();
        return view("pages.adminRegisterStudent", ['students'=>$students, 'programs'=>$programs, 'isAll'=>false, 'filter'=>['id_course'=>$filter['course'], 'status'=>$filter['status'], 'start_date'=> $filter['start_date'], 'end_date'=>$filter['end_date']]]);
    }

    //export all student datalist in excel file

    function export(Request $request){

        $start_date = date('Y-m-d H:i:s',strtotime($request->start_date));
        $end_date = date('Y-m-d H:i:s',strtotime($request->end_date));
        $fileExt = 'xls';
        $exportFormat = \Maatwebsite\Excel\Excel::XLS;
        $filename = "nolitc-exported-data".date('d-m-Y').".".$fileExt;

        return Excel::download(new FilterExport($request->course, $request->status, $start_date, $end_date), $filename, $exportFormat);
    }

    //export filter student datalist in excel file

    function export_excel(){
        $fileExt = 'xls';
        $exportFormat = \Maatwebsite\Excel\Excel::XLS;
        $filename = "nolitc-exported-data".date('d-m-Y').".".$fileExt;
        return Excel::download(new StudentsExport, $filename, $exportFormat);
    }

    //update account settings

    public function update(Request $request, $id)
    {
        // Validate incoming data, including the current password and new password confirmation
        $data = $request->validate([
            "fname"             => ['required'],
            "lname"             => ['required'],
            "email"             => ['required', 'email', Rule::unique('users')->ignore($id)],
            "username"          => ["required"],
            "current_password"  => ['required'],
            "password"          => ['required', 'min:4', 'confirmed'], //change the minimum if necessary
        ]);

        $adminData = User_info::find($id);

        // check if the current password matches the stored password
        if (!Hash::check($data['current_password'], $adminData->password)) {
            return redirect()->back()->with('invalid', 'Current password is incorrect.');
        }

        // update the admin data (do not store a decrypted version for added security)
        $adminData->fname = $data['fname'];
        $adminData->lname = $data['lname'];
        $adminData->email = $data['email'];
        $adminData->username = $data['username'];
        $adminData->password = bcrypt($data['password']);
        // $adminData->decrypt = $data['password']; // Removed for increased security, reinstate if necessary
        $adminData->save();

        return redirect()->back()->with('password_changed', true);
    }

    //goto student applicant profile

    public function student_profile($id){
        $student = Students::find($id);
        $student['birthdate'] = date("M-d-Y", strtotime($student['birthdate']));
        return view('pages.adminuser_profile', ['student'=>$student]);
    }

    // Delete student applicant (depricated)
        public function deleteApplicant(Request $request)
        {
            // Message for deleted student applicant
            $data = [
                'message' => '
                    Thank you for your interest in the Negros Occidental Language and Information Technology Center (NOLITC). We appreciate the time you took to complete the registration form.' . "\n" .
                    'After careful consideration, we regret to inform you that we are unable to offer you a place in the course at this time. The selection process was highly competitive, and we received many strong registrations.' . "\n" .
                    'We encourage you to apply again in the future and wish you the best in your educational and professional endeavors. If you have any questions, please feel free to contact us at:' . "\n",
                'telephone' => "(034) 435 6092",
                'email' => "nolitc@gmail.com"
            ];
            
            $student = Students::find($request->student_id);
            
            // Send email
            Mail::to($student->email)->send(new Sendemail($data));
            
            // Delete student record
            $student->delete();
            
            return redirect()->route('register_admin');
        }

        //Decline student applicant
        public function declineApplicant(Request $request)
        {
            $student = Students::findOrFail($request->student_id);

            $data = [
                'message' => 
                    "Thank you for your interest in the Negros Occidental Language and Information Technology Center (NOLITC). 
                    We appreciate the time you took to complete the registration form.\n\n" .
                    "After careful consideration, we regret to inform you that we are unable to offer you a place in the course at this time. 
                    The selection process was highly competitive, and we received many strong registrations.\n\n" .
                    "We encourage you to apply again in the future and wish you the best in your educational and professional endeavors. 
                    If you have any questions, please feel free to contact us at:\n",
                'telephone' => "(034) 435 6092",
                'email' => "nolitc@gmail.com"
            ];

            Mail::to($student->email)->send(new Sendemail($data));

            $student->status = 2;
            $student->save();

            return redirect()->back()->with('success', 'Applicant has been declined.');
        }

        // Accept student applicant
        public function acceptApplicant(Request $request)
        {
            $user_id = $request->student_id;
            $student = Students::find($user_id);
            
            // Message for accepted student applicant
            $data = [
                'message' => '
                    We are pleased to inform you that your registration form has been approved, and you are now eligible to take the examination via the provided link ' . $student->program->exam_link . ' . The outcome of this examination will play a significant role in determining your acceptance into Negros Occidental Language and Information Technology Center (NOLITC).' . "\n" .
                    'We look forward to your participation in the course and are confident that you will find it both challenging and rewarding.' . "\n" .
                    'If you have any questions or need further information, do not hesitate to contact us at:' . "\n",
                'telephone' => "(034) 435 6092",
                'email' => "nolitc@gmail.com"
            ];
            
            Mail::to($student->email)->send(new Sendemail($data));
            
            $student->status = 1;
            $student->save();
            
            return redirect()->route('register_admin');
        }

    //download pdf for student profile
    public function downloadPdf($id){
        $student = Students::find($id);
        //convent date format
        $student['birthdate'] = date("M-d-Y", strtotime($student['birthdate']));
        $data = [
            'title' => 'student profile',
            'student' =>  $student
        ];
        //download pdf
        $pdf = Pdf::loadView('pdf.downloadPdf', ['data'=>$data])->setPaper('a4', 'portrait');
        return $pdf->download($student->fname." ".$student->lname.".pdf");
    }

    //goto program management page
    public function program_management(){
        return view('pages.adminprogrammanagemant');
    }

    //goto program management form

    public function program_management_form(){
        $programs = Programs::orderBy('id', 'DESC')->get();
        return view('pages.adminprogramsform', ['programs'=>$programs]);
    }

    //goto program form
    public function programs_addform(){
        return view('pages.adminprogramsinsertform');
    }

    //add tesda qualification logic
    public function addTesdaQualification(Request $request){
        $data = $request->validate([ //data validation
            'course_name'=> 'required',
            'hours'=> 'required|numeric',
            'exampleLink'=>'required',
            'course_caption'=> 'required',
            'qualification'=> 'required|array',
            'benefits'=> 'required|array',
            'competencies'=> 'required|array',
            'image'=>'mimes:jpeg,png,bmp,tiff |max:4094',
        ]);
        //create name for image uploaded
        $database = time().'.'.$data['image']->extension() ;
        $filename = $request->getSchemeAndHttpHost(). '/assets/img/'.$database;
        $data['image']->move(public_path('/assets/img/'), $filename);

        //get latest data in database
        // $lastest_id = DB::table('programs')->latest('created_at')->first();

        //send to database in program table
       Programs::create([
        // 'id'=>$lastest_id->id+1,
        'name'=> $data['course_name'],
        'exam_link'=> $data['exampleLink'],
        'hours'=> $data['hours'],
        'caption'=> $data['course_caption'],
        'img_name' => $database,
       ]);

       $lastest_id = DB::table('programs')->latest('updated_at')->first(); //get the id of sent data

       //send to database all qualification to qualification table
       foreach($data['qualification'] as $qualification){
            Qualifications::create([
                'programs_id'=>$lastest_id->id,
                'qualification'=>$qualification
            ]);
       }
    //send to database all benefits to benefits table
       foreach($data['benefits'] as $benefit){
            Benefits::create([
                'programs_id'=>$lastest_id->id,
                'benefit'=>$benefit
            ]);
       }

       //send to database all competencies to competencies table
       foreach($data['competencies'] as $competencies){
            Competencies::create([
                'programs_id'=>$lastest_id->id,
                'competencie'=>$competencies
            ]);
       }

       return redirect('program-management/form')->with('success','Add Success');

    }
    //goto program content by id
    public function program_qualification($id){
        $program = Programs::find($id);
        return view('pages.adminprogramsContent', ['program'=>$program]);
    }
    //goto update program form by id
    public function update_program($id){
        $program = Programs::find($id);
        return view('pages.adminprogramsupdateform', ['program'=>$program]);
    }

    //send updated program content logic
    public function updateContent_program(Request $request, $id){
        $data = $request->validate([
            'course_name'=> 'required',
            'hours'=> 'required|numeric',
            'exampleLink'=>'required',
            'course_caption'=> 'required',
            'qualification'=> 'required|array',
            'benefits'=> 'required|array',
            'competencies'=> 'required|array',
            'image'=>'mimes:jpeg,png,bmp,tiff |max:4094',
        ]);

        $program = Programs::find($id);
        $program->exam_link = $data['exampleLink'];
        $program->name = $data['course_name'];
        $program->hours = $data['hours'];
        $program->caption = $data['course_caption'];
        
        if($request->image!==null){ //validate if the file input is not empty
            if($data['image']!==null){
                $database = time().'.'.$data['image']->extension() ;
                $filename = $request->getSchemeAndHttpHost(). '/assets/img/'.$database;
                $data['image']->move(public_path('/assets/img/'), $filename);
                $program->img_name = $database;
            }
        }
        $program->save();
        //delete the old data
        Qualifications::where('programs_id','=',$id)->delete();
        Competencies::where('programs_id','=',$id)->delete();
        Benefits::where('programs_id','=',$id)->delete();

        //insert the updated data
        foreach ($data['qualification'] as $qualification){
            Qualifications::create([
                'programs_id'=>$id,
                'qualification'=>$qualification
            ]);
        }

        foreach ($data['competencies'] as $competencies){
            Competencies::create([
                'programs_id'=>$id,
                'competencie'=>$competencies
            ]);
        }

        foreach ($data['benefits'] as $benefits){
            Benefits::create([
                'programs_id'=>$id,
                'benefit'=>$benefits
            ]);
        }

        return redirect()->back()->with('success','Update success');

    }


    //delete program
    public function delete_program(Request $request){
       Programs::where('id','=',$request->delete_id)->delete();
       return redirect('program-management/form')->with('success','Add Success');
    }

    //goto score card
    public function showScoreCard()
    {
        $scoreCard = ScoreCard::first(); // Fetch all score cards
        return view('pages.score_card', ['scoreCard' => $scoreCard]); // Pass the score cards to the view
    }
    //update score cards in database
    public function updateScoreCards(Request $request, $id){
        $data = $request->validate([
            'number_of_graduates'=> 'required|numeric',
            'number_of_employed'=> 'required|numeric',
            'employment_rate'=> 'required|numeric'
        ]);
        $scoreCards = ScoreCard::find($id);
        $scoreCards->number_of_graduates = $data['number_of_graduates'];
        $scoreCards->number_of_employed = $data['number_of_employed'];
        $scoreCards->employment_rate = $data['employment_rate'];
        $scoreCards->save();
        return redirect()->back()->with('success','Update success');
    }


    //goto manage partners page
    public function managePartners(){
        $partners = Partners::orderBy('id', 'ASC')->paginate(10);
        return view('pages.adminManagePartner', ['partners'=>$partners]);
    }

    //add partners data in database
    public function add_partners(Request $request){
        $data = $request->validate([
            'image'=> 'required|mimes:jpeg,png,bmp,tiff|max:4094',
            'link'=> 'required|string'
        ]);

        $database = time().'.'.$data['image']->extension();
        // Store only the file name; files live in public/assets/partners_logo
        $data['image']->move(public_path('assets/partners_logo/'), $database);
        Partners::create([
            'logo' => $database,
            'link' => $data['link']
        ]);

        return redirect()->back()->with('success','Add success');
    }

    //delete partners in database
    public function delete_partners(Request $request){
        DB::table('partners')->where('id', '=', $request->partners_id)->delete();
        return redirect()->back()->with('success','Delete success');
    }

    //update partner data in database
    public function update_partners(Request $request){
        $data = $request->validate([
            'partners_id' => 'required|integer|exists:partners,id',
            'link'        => 'required|string',
            'image'       => 'nullable|mimes:jpeg,png,bmp,tiff|max:4094'
        ]);

        $partner = Partners::findOrFail($data['partners_id']);
        $partner->link = $data['link'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = time().'.'.$file->extension();
            $file->move(public_path('assets/partners_logo/'), $newName);
            $partner->logo = $newName;
        }

        $partner->save();
        return redirect()->back()->with('success','Partner updated successfully');
    }

    public function adminUpdates() 
    {
        $updates = Updates::orderBy('date', 'desc')->get();
        return view('pages.adminUpdates', compact('updates'));
    }

    public function getUpdate($id)
    {
        $update = Updates::findOrFail($id);
        return response()->json($update);
    }

    public function addUpdate(Request $request) 
    {
        $data = $request->validate([
            'title'          => 'required|string|max:255',
            'content'        => 'required|string',
            'date'           => 'required|date',
            'facebook_embed' => 'nullable|string',
            'image'          => 'nullable|mimes:jpeg,png,bmp,tiff|max:4094',
        ]);

        $update = new Updates();
        $update->title = $data['title'];
        $update->content = $data['content'];
        $update->date = $data['date'];
        $update->facebook_embed = $data['facebook_embed'] ?? null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->extension();
            $file->move(public_path('assets/img/'), $filename);
            $update->image = $filename;
        }

        $update->save();

        return redirect()->back()->with('success', 'Update added successfully.');
    }

    public function updateUpdate(Request $request, $id) 
    {
        $data = $request->validate([
            'title'          => 'required|string|max:255',
            'content'        => 'required|string',
            'date'           => 'required|date',
            'facebook_embed' => 'nullable|string',
            'image'          => 'nullable|mimes:jpeg,png,bmp,tiff|max:4094',
        ]);

        $update = Updates::findOrFail($id);
        $update->title = $data['title'];
        $update->content = $data['content'];
        $update->date = $data['date'];
        $update->facebook_embed = $data['facebook_embed'] ?? null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->extension();
            $file->move(public_path('assets/img/'), $filename);
            $update->image = $filename;
        }

        $update->save();

        return redirect()->back()->with('success', 'Update updated successfully.');
    }

    public function deleteUpdate(Request $request) 
    {
        $update = Updates::findOrFail($request->update_id);
        $update->delete();

        return redirect()->back()->with('success', 'Update deleted successfully.');
    }

    public function toggleUpdateStatus(Request $request) 
    {
        $update = Updates::findOrFail($request->update_id);
        $update->is_active = !$update->is_active;
        $update->save();

        return redirect()->back()->with('success', 'Update status updated successfully.');
    }

    public function parseFacebookEmbed(Request $request)
    {
        $embedCode = $request->input('facebook_embed');
        
        // Log the incoming embed code for debugging
        \Log::info('Facebook embed parsing attempt', ['embed_code' => $embedCode]);
        
        // Extract Facebook post URL from embed code - handle both iframe and div formats
        $postUrl = null;
        
        // Try iframe format first (src attribute)
        if (preg_match('/src="([^"]+)"/', $embedCode, $matches)) {
            $iframeSrc = $matches[1];
            // Extract the href parameter from the iframe src
            if (preg_match('/href=([^&]+)/', $iframeSrc, $hrefMatches)) {
                $postUrl = urldecode($hrefMatches[1]);
            }
        }
        
        // Fallback to div format (href attribute)
        if (!$postUrl && preg_match('/href="([^"]+)"/', $embedCode, $matches)) {
            $postUrl = $matches[1];
        }
        
        if (!$postUrl) {
            \Log::warning('Could not extract Facebook post URL from embed code');
            return response()->json(['error' => 'Could not extract Facebook post URL from embed code']);
        }
        
        \Log::info('Extracted Facebook post URL', ['url' => $postUrl]);
        
        try {
            // Use Facebook Graph API to get post details
            $accessToken = env('FACEBOOK_ACCESS_TOKEN'); // You'll need to set this in .env
            
            if ($accessToken) {
                // Extract post ID from URL
                preg_match('/posts\/(\d+)/', $postUrl, $postMatches);
                $postId = $postMatches[1] ?? null;
                
                if ($postId) {
                    $graphUrl = "https://graph.facebook.com/v18.0/{$postId}?fields=message,created_time&access_token={$accessToken}";
                    $response = file_get_contents($graphUrl);
                    $data = json_decode($response, true);
                    
                    if (isset($data['message'])) {
                        // Extract title from message (first line or first 100 characters)
                        $lines = explode("\n", $data['message']);
                        $title = trim($lines[0]);
                        if (strlen($title) > 100) {
                            $title = substr($title, 0, 100) . '...';
                        }
                        
                        // Parse created_time
                        $createdTime = new \DateTime($data['created_time']);
                        $date = $createdTime->format('Y-m-d');
                        
                        return response()->json([
                            'success' => true,
                            'title' => $title,
                            'date' => $date,
                            'message' => $data['message']
                        ]);
                    }
                }
            }
            
            // Fallback: Try to extract basic info from embed code
            $title = $this->extractTitleFromEmbed($embedCode);
            $date = $this->extractDateFromEmbed($embedCode, $postUrl);
            
            // Try to extract more meaningful content from the URL
            $content = $this->extractContentFromEmbed($embedCode, $postUrl);
            
            \Log::info('Using fallback parsing', ['title' => $title, 'date' => $date, 'content' => $content]);
            
            return response()->json([
                'success' => true,
                'title' => $title,
                'date' => $date,
                'message' => $content
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Facebook embed parsing error', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to parse Facebook post: ' . $e->getMessage()]);
        }
    }
    
    private function extractTitleFromEmbed($embedCode)
    {
        // Try to extract any text content from the embed
        $text = strip_tags($embedCode);
        $text = preg_replace('/\s+/', ' ', $text);
        $text = trim($text);
        
        // Try to find meaningful content
        if (preg_match('/class="[^"]*post_message[^"]*"[^>]*>([^<]+)/', $embedCode, $matches)) {
            $text = trim($matches[1]);
        } elseif (preg_match('/<div[^>]*>([^<]+)<\/div>/', $embedCode, $matches)) {
            $text = trim($matches[1]);
        }
        
        // Clean up the text
        $text = preg_replace('/[^\w\s\-.,!?]/', '', $text);
        $text = trim($text);
        
        // If we still don't have meaningful text, try to extract from URL parameters
        if (empty($text) || strlen($text) < 5) {
            if (preg_match('/href=([^&]+)/', $embedCode, $matches)) {
                $url = urldecode($matches[1]);
                // Extract domain or path info as title
                $parsedUrl = parse_url($url);
                if (isset($parsedUrl['path'])) {
                    $path = trim($parsedUrl['path'], '/');
                    if ($path) {
                        // Extract page name from path (e.g., "Nolitcinspire" from "Nolitcinspire/posts/...")
                        $pathParts = explode('/', $path);
                        if (isset($pathParts[0]) && $pathParts[0] !== 'posts') {
                            $pageName = $pathParts[0];
                            // Clean up the page name
                            $pageName = str_replace(['-', '_'], ' ', $pageName);
                            $pageName = ucwords($pageName);
                            
                            // Check if it's a known page
                            if (stripos($pageName, 'nolitc') !== false) {
                                $text = 'NOLITC Update - ' . $pageName;
                            } else {
                                $text = 'Facebook Post from ' . $pageName;
                            }
                        } else {
                            $text = 'Facebook Post';
                        }
                    }
                }
            }
        }
        
        if (strlen($text) > 100) {
            $text = substr($text, 0, 100) . '...';
        }
        
        return $text ?: 'Facebook Post';
    }

    private function extractDateFromEmbed($embedCode, $postUrl)
    {
        // Try to extract date from the URL if available
        $date = null;
        if (preg_match('/created_time=([^&]+)/', $postUrl, $matches)) {
            $dateString = urldecode($matches[1]);
            try {
                $date = new \DateTime($dateString);
                return $date->format('Y-m-d');
            } catch (\Exception $e) {
                \Log::warning('Could not parse date from URL: ' . $dateString, ['error' => $e->getMessage()]);
            }
        }

        // Fallback to parsing the embed code itself
        if (preg_match('/created_time=([^&]+)/', $embedCode, $matches)) {
            $dateString = urldecode($matches[1]);
            try {
                $date = new \DateTime($dateString);
                return $date->format('Y-m-d');
            } catch (\Exception $e) {
                \Log::warning('Could not parse date from embed code: ' . $dateString, ['error' => $e->getMessage()]);
            }
        }

        return date('Y-m-d'); // Default to today
    }

    private function extractContentFromEmbed($embedCode, $postUrl)
    {
        // Try to extract meaningful content from the URL structure
        $parsedUrl = parse_url($postUrl);
        $content = '';
        
        if (isset($parsedUrl['path'])) {
            $path = trim($parsedUrl['path'], '/');
            $pathParts = explode('/', $path);
            
            if (isset($pathParts[0])) {
                $pageName = $pathParts[0];
                $pageName = str_replace(['-', '_'], ' ', $pageName);
                $pageName = ucwords($pageName);
                
                if (stripos($pageName, 'nolitc') !== false) {
                    $content = "This is an update from the {$pageName} Facebook page. ";
                } else {
                    $content = "This is a post from the {$pageName} Facebook page. ";
                }
                
                // Add post type information
                if (isset($pathParts[1]) && $pathParts[1] === 'posts') {
                    $content .= "The post was shared on Facebook and can be viewed by clicking the 'View Post' button below.";
                }
            }
        }
        
        // If we still don't have content, provide a generic message
        if (empty($content)) {
            $content = "This Facebook post has been embedded and can be viewed by clicking the 'View Post' button below.";
        }
        
        return $content;
    }

    //goto intro images page
    public function intro_images(){
        $introImages = IntroImage::all();
        return view('pages.adminIntroImages', ['introImages'=>$introImages]);
    }

    //goto intro images form
    public function intro_images_form(){
        return view('pages.adminIntroImagesForm');
    }

    //add intro images logic
    public function add_intro_images(Request $request){
        $data = $request->validate([
            'image'=> 'required|mimes:jpeg,png,bmp,tiff |max:4094',
            'order'=> 'required|numeric'
        ]);

        $database = time().'.'.$data['image']->extension() ;
        $filename = $request->getSchemeAndHttpHost(). '/assets/img/'.$database;
        $data['image']->move(public_path('/assets/img/'), $filename);

        IntroImage::create([
            'image'=>$database,
            'order'=>$data['order']
        ]);

        return redirect('intro-images')->with('success','Add Success');
    }

    //delete intro images logic
    public function delete_intro_image(Request $request){
        IntroImage::where('id','=',$request->intro_image_id)->delete();
        return redirect('intro-images')->with('success','Delete Success');
    }

    //update intro image order logic
    public function update_intro_image_order(Request $request){
        $data = $request->validate([
            'order'=> 'required|array'
        ]);

        foreach($data['order'] as $key => $value){
            IntroImage::where('id','=',$value)->update(['order'=>$key]);
        }

        return redirect('intro-images')->with('success','Update Success');
    }

}