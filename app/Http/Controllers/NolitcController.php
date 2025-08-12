<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Partners;
use App\Models\Programs;
use App\Models\ScoreCard;
use App\Models\Contents; // FIX: Import the correct model
use App\Models\IntroImage;
use App\Models\Updates;
use Illuminate\Http\Request;

class NolitcController extends Controller
{
    function register_student(){
        $programs = Programs::all();
        return view("students.register", ["programs" => $programs]);
    }

    public function welcome(){
        $intro_images = IntroImage::active()->ordered()->get();
        $score_card = ScoreCard::query()->firstOrCreate([], [
            'number_of_graduates' => 0,
            'number_of_employed' => 0,
            'employment_rate' => 0,
        ]);
        $updates = Updates::latest()->take(4)->get(); 
        $partners = Partners::orderBy('id','asc')->get();
        $programs = Programs::orderBy('id', 'asc')->take(3)->get();

        return view("welcome", [
            'datas' => $intro_images,
            'scoreCard' => $score_card,
            'updates' => $updates,
            'partners' => $partners,
            'programs' => $programs
        ]);
    }

    public function see_more($id){
        $data_content = Programs::find($id);
        return view("see_more", ["datas"=> $data_content]);
    }

    public function know_more(){
        return view("about");
    }

    public function thank_page(){
        return view("thank_you");
    }
}
