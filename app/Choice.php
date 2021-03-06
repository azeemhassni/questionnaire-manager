<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = ['choice', 'is_correct'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function setIsCorrectAttribute($value)
    {
        $this->attributes['is_correct'] = $value === "on";
    }
}
