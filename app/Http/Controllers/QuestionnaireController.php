<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionnaireRequest;
use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $questionnaires = Questionnaire::withCount('questions')->paginate(20);
        return view('questionnaire.index')->with(compact('questionnaires'));
    }

    public function create()
    {
        return view('questionnaire.create');
    }

    public function store(CreateQuestionnaireRequest $request)
    {
        auth()->user()->questionnaires()->create($request->all());

        return redirect()->route('questionnaire.index')->with(['message' => 'The questionnaire was created successfully']);
    }

    public function edit(Questionnaire $questionnaire)
    {
        return view('questionnaire.edit')->with(compact('questionnaire'));
    }

    public function update(Questionnaire $questionnaire, CreateQuestionnaireRequest $request)
    {
        $questionnaire->update($request->all());
        return redirect()->route('questionnaire.index')->with(['message' => 'Questionnaire was updated successfully']);
    }

    public function destory(Questionnaire $questionnaire)
    {
        $questionnaire->delete();
        return redirect()->route('questionnaire.index')->with(['message' => 'Questionnaire was deleted successfully']);
    }
}
