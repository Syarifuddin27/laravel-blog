<?php

namespace App\Http\Controllers;

use MercurySeries\Flashy\Flashy;

use Auth;
use App\Tag;
use App\Post;
use File;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('post'))
            ->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        if ($categories->count() == 0 || $tags->count() == 0) 
        {

            Flashy::error('You must have some categories and tags before attemping to create a post.');
            
            return redirect()->back();
            
        }
        
        return view('admin.posts.create')->with('categories', $categories)
                                         ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'category_id' => 'required',
            'tags' => 'required',
            'content' => 'required'
            
        ]);
        $featured = $request->featured;
        $featured_new_name = time() . $featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([ 
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id()
        ]);
            $post->tags()->attach($request->tags);

        flashy()->success('Succesfully to Create new Post.');

        return redirect('admin/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'))
                    ->with('categories', Category::all())
                    ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if ($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();
            // File::delete('' .  $post->featured);
            $featured->move('uploads/posts', $featured_new_name);
            
            $post->featured = 'uploads/posts/' . $featured_new_name;
        }

        

        
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title);
        $post->tags()->sync($request->tags);
        $post->save();
        
        flashy()->success('Succesfully to Update.');

        return redirect('admin/post');
    }
    // public function update(Request $request, Post $post)
    // {
    //     Request()->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //         'tags' => 'required',
    //         'category_id' => 'required'
    //     ]);
    //     if ($request->hasFile('featured')) {
    //         $featured = $request->featured;
    //         $featured_new_name = time() . $featured->getClientOriginalName();
    //         $featured->move('uploads/posts', $featured_new_name);
    //         $post->featured = 'uploads/posts/'. $featured_new_name;
    //     }

    //     $post->title = $request->title;
    //     $post->content = $request->content;
    //     $post->category_id = $request->category_id;
    //     $post->slug = str_slug($request->title);
    //     // 'slug' => str_slug($request->title)
    //     $post->tags()->sync($request->tags);
    //     $post->save();

    //     // dd($post);

    //     // dd(Request);

    //     flashy()->success('Succesfully to Update.');

    //     return redirect('admin/post');

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('admin/post');
        flashy()->info('The post was just trashed.');
    }
    
}
