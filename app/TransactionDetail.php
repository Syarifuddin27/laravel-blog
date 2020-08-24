<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_details';
    protected $fillable = [
        'type',
        'user_id',
        'post_id',
        'trasnsaction_id',
        'qty'
    ];

    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
