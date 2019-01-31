<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UserAction extends Model
{
    use SoftDeletes;
<<<<<<< HEAD

    protected $fillable = ['action', 'action_model', 'action_id', 'user_id'];


    /**
     * Set to null if empty
     * @param $input
     */
=======
    
    protected $fillable = ['action', 'action_model', 'action_id', 'user_id'];
    
>>>>>>> 090e796d1cdc19c55cafe785be19a3f8ef20afc3
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }
<<<<<<< HEAD

=======
    
>>>>>>> 090e796d1cdc19c55cafe785be19a3f8ef20afc3
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
}
