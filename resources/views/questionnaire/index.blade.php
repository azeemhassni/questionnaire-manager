@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Questionnaires</h2>
                        <div class="float-right">
                            <a href="{{ route('questionnaire.create') }}" class="btn btn-dark">Create Questionnaire</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-hovered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Number of Questions</th>
                                <th>Duration</th>
                                <th>Resumeable</th>
                                <th>Published</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse( $questionnaires as $questionnaire )
                                <tr>
                                    <td>{{ $questionnaire->id }}</td>
                                    <td>{{ $questionnaire->name }}</td>
                                    <td>
                                        {{ $questionnaire->questions_count }} |
                                        <a href="{{ route('question.create', $questionnaire) }}">Add</a>
                                    </td>
                                    <td>{{  $questionnaire->duration }} {{ $questionnaire->time_in }}</td>
                                    <td>{{ $questionnaire->yn_can_resume }}</td>
                                    <td>{{ $questionnaire->yn_is_published }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col"><a class="btn btn-dark"
                                                                href="{{ route('questionnaire.edit', $questionnaire) }}">Edit</a>
                                            </div>
                                            <div class="col">
                                                @component('components.delete_action', [
                                                'action' =>   route('questionnaire.destroy', $questionnaire),
                                                'method' => 'DELETE'
                                                ])
                                                @endcomponent
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Questionnaires Added Yet</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection