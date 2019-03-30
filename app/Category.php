<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];

    public function exams()
    {
        return $this->hasMany(Exam::class, 'exam_id')->withTrashed();
    }
}
