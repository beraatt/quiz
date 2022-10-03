<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;

class MainController extends Controller
{
    public function dashboard(){
      /*  return $quizzes = Quiz::where('status','publish')->withCount('questions')->paginate(5); */
        return view('dashboard');
    }

}
