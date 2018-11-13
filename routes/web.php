<?php


Route::redirect('/', '/questionnaire');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::resource('questionnaire', 'QuestionnaireController');

    Route::resource('{questionnaire}/question', 'QuestionController')->only([
        'create',
        'store'
    ]);


});