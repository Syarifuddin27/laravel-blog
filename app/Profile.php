<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'avatar', 'user_id', 'about', 'ig', 'youtube'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
