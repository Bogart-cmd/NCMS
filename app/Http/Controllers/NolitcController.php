<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Partners;
use App\Models\Programs;
use App\Models\ScoreCard;
use App\Models\Contents; // FIX: Import the correct model
use App\Models\IntroImage;
use Illuminate\Http\Request;

class NolitcController extends Controller
{
    function register_student(){
        $programs = Programs::all();
        return view("students.register", ["programs" => $programs]);
    }

    public function welcome(){
        $intro_images = IntroImage::active()->ordered()->get();
        $score_card = ScoreCard::first();
        $updates = Contents::latest()->take(4)->get(); 

        return view("welcome", [
            'datas' => $intro_images,
            'scoreCard' => $score_card,
            'updates' => $updates 
        ]);
    }

    public function tesda_qual(){
        $data_content = Programs::all();
        return view("tesda_qual", ["datas"=> $data_content]);
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
