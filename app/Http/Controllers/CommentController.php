<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Tweet $tweet){

        $comment = new Comment();
        $comment->tweet_id = $tweet->id;
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('tweets.show', $tweet->id)->with('success', 'Comment posted successfully!');
    }
}
