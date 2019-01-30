<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Question;

class Subject extends Model
{
    use SoftDeletes;

    protected $fillable = ['title'];

    public static function boot()
    {
        parent::boot();

        Subject::observe(new \App\Observers\UserActionsObserver);
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'subject_id')->withTrashed();
    }
}
