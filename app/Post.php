<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title', 
        'slug', 
        'content', 
        'harga_jual',
        'harga_grosir',
        'jumlah',
        'category_id',
        'featured',
        'qty',
        'user_id'
    ];

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }
    protected $dates = ['deleted_at']; 

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function trDetail()
    {
        return $this->hasMany('App\TransactionDetail');
    }

    public function postView()
    {
        return $this->hasMany('App\PostView');
    }
}
