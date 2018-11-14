@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Create Questionnaires</h2>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('questionnaire.update', $questionnaire) }}">
                            {{ method_field('PATCH') }}
                            @include('questionnaire._form')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection