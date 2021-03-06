<?php

namespace App\Http\Controllers;

use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param Questionnaire $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function create(Questionnaire $questionnaire)
    {
        return view('question.create', compact('questionnaire'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Questionnaire $questionnaire
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Questionnaire $questionnaire, Request $request)
    {

        foreach ($request->get('questions') as $question) {

            // save the question with choices
            $model = $questionnaire->questions()
                ->create($question);

            if (in_array($question['type'], ['MCMO', 'MCSO'])) {
                $model->choices()->createMany($question['choices']);
            }

        }

        return redirect()->route('questionnaire.index')->with(['message' => 'Questions has been added successfully']);
    }
}
