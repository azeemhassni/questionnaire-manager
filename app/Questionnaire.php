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

}
