<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $fillable = [
        'user_id'
    ];

    public function trDetail(){
        return $this->hasOne('App\TransactionDetail');
    }

}
