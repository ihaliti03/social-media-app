<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function store()
    {
        request()->validate([
            'content' => 'required|min:1|max:240'
        ]);

        $tweet = Tweet::create([
            'content' => request()->get('content', ''),
        ]);
        $tweet->save();

        return redirect()->route('dashboard')->with('success', 'Tweet posted successfully!');
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return redirect()->route('dashboard')->with('success', 'Tweet deleted successfully!');
    }


    public function show(Tweet $tweet)
    {
        return view('tweets.show', compact('tweet'));
    }

    public function edit(Tweet $tweet)
    {
        $editing = true;
        return view('tweets.show', compact('tweet', 'editing'));
    }

    public function update(Tweet $tweet)
    {
        request()->validate([
            'content' => 'required|min:1|max:240'
        ]);

        $tweet->content = request()->get('content', '');
        $tweet->save();

        return redirect()->route('tweets.show', $tweet->id)->with('success', 'Tweet updated successfully!');
    }
}