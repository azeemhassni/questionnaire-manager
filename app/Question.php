<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['type', 'question', 'answer'];

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
