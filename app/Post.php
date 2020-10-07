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
        'category_id', 
        'featured', 
        'slug', 
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
}
