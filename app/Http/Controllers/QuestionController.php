<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id_theme)
    {
        $questions = Question::where('id_theme',$id_theme)->get();
        //dd($questions);
        for ($i=0;$i<10;$i++){          //A CHANGER///////////////////////////
            $questions[$i]->question = $request->input($i."_question");
            $questions[$i]->reponse = $request->input($i."_reponse");
            $questions[$i]->carre1 = $request->input($i."_carre1");
            $questions[$i]->carre2 = $request->input($i."_carre2");
            $questions[$i]->carre3 = $request->input($i."_carre3");
            $questions[$i]->carre4 = $request->input($i."_carre4");
            $questions[$i]->duo1 = $request->input($i."_duo1");
            $questions[$i]->duo2 = $request->input($i."_duo2");
            $questions[$i]->save();
            //dd($questions[$i]);
        }
        //dd($questions);

        return redirect('/creation_quiz');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
