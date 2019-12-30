<?php

namespace App\Http\Controllers;

use App\Question;
use App\Quiz;
use App\Theme;
use App\Users;
use Illuminate\Http\Request;

class CreationQuizController extends Controller
{
    public function index(){                 //Affichage de base

        $quiz = Quiz::where('Visibilite',0)->first();

        //dd($quiz);
        if ($quiz===NULL){
            $quiz = new Quiz;
            $quiz->Visibilite=0;
            $quiz->id_user= auth()->user()->id_user;
            $quiz ->save();
        }
        $questions = Question::where('id_quiz',$quiz->id_quiz)->get();
        //dd($questions);
        $theme = \DB::table('users')->join('theme','users.id_user','theme.id_user')->get();
        $users = Users::all();
        //$numero = $quiz->id_quiz;
        //dd($theme);
        return view('quiz_creation.creation_panel',compact('users','theme','questions'));
    }
}
