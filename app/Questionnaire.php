<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = ['name', 'duration', 'time_in', 'can_resume', 'is_published'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }


    public function getYNCanResumeAttribute()
    {
        return $this->attributes['can_resume'] ? 'Yes' : 'No';
    }

    public function getYNIsPublishedAttribute()
    {
        return $this->attributes['is_published'] ? 'Yes' : 'No';
    }

}
