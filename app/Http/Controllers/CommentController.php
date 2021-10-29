<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'text'=> 'required',
            'post_id' =>['required'],
        ]);

//        $comment = new Comment();
//        $comment->text=$request->input('text');
//        $comment->post_id=$request->input('post_id');
//        $comment->user_id=Auth::user()->id();
//        $comment->save();
//        dd(Auth::id());
        Comment::create([
            'text'=>$request->input('text'),
            'post_id'=>$request->input('post_id'),
            'user_id'=>Auth::id(),
        ]);
    }
}
