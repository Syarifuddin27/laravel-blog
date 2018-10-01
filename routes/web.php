<?php

use App\Http\Controllers\PostController;


Route::post('/subscribe', function(){
    $email = request('email');

    Newsletter::subscribe($email);
    Flashy::info('Successfuly subscribed.');
    return redirect()->back();
});

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/results', function(){
    $posts = \App\Post::where('title', 'like', '%' . request('query') . '%')->get();
    return view('results')->with('posts', $posts)
                          ->with('title', 'Search results : ' . request('query'))
                          ->with('tag', \App\Tag::all())
                          ->with('settings', \App\Setting::first())
                          ->with('categories', \App\Category::all())
                          ->with('query', request('query'));
});

Route::get('/post/{slug}',[
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);

Route::get('/category/{id}', [
    'uses' => 'FrontEndController@category',
    'as' => 'category.single'
]);

Route::get('/tag/{id}', [
    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single'
]);

Route::get('/admin', function() {
    return view('admin.index');
});


Auth::routes();



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/dashboard', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    Route::resource('/post', 'PostController', [
        'except' => 'show.index'
    ]);


    Route::resource('/category', 'CategoryController', [
        'except' => 'show.index'
    ]);
    
    Route::resource('/tags', 'TagController');
    
    Route::resource('/users', 'UserController')->middleware('admin');
    
    Route::get('/user/profile',[
        'uses' => 'ProfileController@index',
        'as' => 'user.profile'
    ]);
    Route::post('/user/profile/update', [
        'uses' => 'ProfileController@update',
        'as' => 'user.profile.update'
    ]);
    Route::get('/settings', [
        'uses' => 'SettingController@index',
        'as' => 'settings'
    ]);
    Route::post('/settings/update', [
        'uses' => 'SettingController@update',
        'as' => 'settings.update'
    ]);
    
});

