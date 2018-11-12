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

                        <form method="POST" action="{{ route('questionnaire.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('Questionnaire Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           placeholder="Enter Questionnaire Name"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="duration"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('Duration') }}</label>

                                <div class="col-md-6">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <input id="duration" type="text"
                                                   placeholder="Enter Duration"
                                                   class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }}"
                                                   name="duration" value="{{ old('duration') }}" required autofocus>
                                            @if ($errors->has('duration'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('duration') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <select id="time_in" type="text"
                                                    class="form-control{{ $errors->has('time_in') ? ' is-invalid' : '' }}"
                                                    name="time_in" required>
                                                <option {{ old('time_in') === "Minutes" ? 'selected' : '' }} value="Minutes">
                                                    Minutes
                                                </option>
                                                <option {{ old('time_in') === "Hours" ? 'selected' : '' }} value="Hours">
                                                    Hours
                                                </option>
                                            </select>

                                            @if ($errors->has('time_in'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('time_in') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('Can Resume?') }}</label>

                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="can_resume" id="canResume"
                                               value="1">
                                        <label class="form-check-label" for="can_resume">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input checked class="form-check-input" type="radio" name="can_resume"
                                               id="canResume"
                                               value="0">
                                        <label class="form-check-label" for="can_resume">No</label>
                                    </div>

                                    @if ($errors->has('can_resume'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('can_resume') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('Is Published?') }}</label>

                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input checked class="form-check-input" type="radio" name="is_published"
                                               id="canResume"
                                               value="1">
                                        <label class="form-check-label" for="is_published">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_published"
                                               id="isPublished"
                                               value="0">
                                        <label class="form-check-label" for="is_published">No</label>
                                    </div>

                                    @if ($errors->has('can_resume'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('can_resume') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection