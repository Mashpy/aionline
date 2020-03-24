<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizTopic extends Model
{

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }
}