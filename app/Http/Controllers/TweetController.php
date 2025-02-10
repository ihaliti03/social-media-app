<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{

    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $validated['user_id'] = Auth::user()->id;

        Tweet::create($validated);

        return redirect()->route('dashboard')->with('success', 'Tweet posted successfully!');
    }

    public function destroy(Tweet $tweet)
    {
        if(Auth::user()->id !== $tweet->user_id){
            abort(404);
        }
        $tweet->delete();

        return redirect()->route('dashboard')->with('success', 'Tweet deleted successfully!');
    }

    public function show(Tweet $tweet)
    {
        return view('tweets.show', compact('tweet'));
    }

    public function edit(Tweet $tweet)
    {
        if(Auth::user()->id !== $tweet->user_id){
            abort(404);
        }
        $editing = true;
        return view('tweets.show', compact('tweet', 'editing'));
    }

    public function update(Tweet $tweet)
    {
        if(Auth::user()->id !== $tweet->user_id){
            abort(404);
        }
        $validated = request()->validate([
            'content' => 'required|min:1|max:240'
        ]);

        $tweet->update($validated);

        return redirect()->route('tweets.show', $tweet->id)->with('success', 'Tweet updated successfully!');
    }
}