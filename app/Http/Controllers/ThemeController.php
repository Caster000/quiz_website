<?php

namespace App\Http\Controllers;

use App\Question;
use App\Quiz;
use App\Theme;
use App\Users;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quiz = Quiz::where('Visibilite',0)->first();
        //dd($quiz);
        $theme = new Theme;
        $theme->id_user=$request->id_user;
        $theme->theme=$request->theme;
        $theme->save();
        for($i=1;$i<=10;$i++){
            $question = new Question;
            $question->id_theme= $theme->id_theme;
            $question->id_quiz=$quiz->id_quiz;
            $question->level=$i;
            $question->save();
        }
        return redirect('/creation_quiz');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function delete($id_theme)
    {
        $theme= Theme::find($id_theme);
        //dd($theme);
        $theme->questions()->delete();
        $theme->delete();
        return redirect('/creation_quiz');
    }
}
