<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Test
 *
 * @package App
 * @property string $title
 */
class Test extends Model
{
    use SoftDeletes;

    protected $fillable = ['exam_id', 'user_id', 'result'];

    public static function boot()
    {
        parent::boot();

        Test::observe(new \App\Observers\UserActionsObserver);
    }

    public function setExamIdAttribute($input)
    {
        $this->attributes['exam_id'] = $input ? $input : null;
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }    
}
