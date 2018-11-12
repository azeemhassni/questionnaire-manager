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
}
