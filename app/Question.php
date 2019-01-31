<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Subject;

class Question extends Model
{
    protected $fillable = ['question_text', 'answer_explanation', 'subject_id'];

    public static function boot()
    {
        parent::boot();

        Question::observe(new \App\Observers\UserActionsObserver);
    }

    public function setSubjectIdAttribute($input)
    {
        $this->attributes['subject_id'] = $input ? $input : null;
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id')->withTrashed();
    }

    public function options()
    {
        return $this->hasMany(QuestionsOption::class, 'question_id')->withTrashed();
    }
}
