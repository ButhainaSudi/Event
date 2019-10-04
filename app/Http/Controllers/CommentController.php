<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use App\Http\Requests;
use App\Comment;
use App\Event;
use Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::all();
        return view('comments.index',compact('comment'));
 
    }

    public function create()
    {
        return view('comments.create');
    }

    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->event_id = $request->event_id;
        $comment->comment = $request->comment;
        $comment->save();    

        return redirect()->route('events.index');
    }

}
