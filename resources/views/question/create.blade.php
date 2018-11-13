@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Add Questions to {{ $questionnaire->name }}</h2>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('question.store', $questionnaire) }}">
                            @include('question._form')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection