<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('category')->get();
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        $cats = Category::all();
        return view('posts.create', compact('cats'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required', 'max:255'],
            'content'=>['required'],
            'category_id'=>['required', 'integer', 'exists:categories,id']
        ]);
//        dd($request);
//        $post = new Post();
//        $post->title = $request->input('title');
//        $post->content = $request->input('content');
//
//        $post->save();
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
        ]);
        return redirect()->route('posts.index')->with('message', 'You created successfully');
    }


    public function show(Post $post)
    {
      $comments = $post->comments;
        return view('posts.show')->with(['post' => $post, 'comments'=>$comments]);
    }


    public function edit(Post $post)
    {
        $cats = Category::all();
        return view('posts.edit')->with(['post' => $post, 'cats' => $cats]);
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=>['required', 'max:255'],
            'content'=>['required'],
            'category_id'=>['required', 'integer', 'exists:categories,id']
        ]);

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id'=>$request->input('category_id'),
        ]);
        return redirect()->route('posts.index')->with('message', 'You updated successfully');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('message', 'You deleted successfully');;
    }
}
