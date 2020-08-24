<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewWebsite extends Model
{
    protected $table = 'view_websites';
    protected $fillable = [
        'ip'
    ];
}
