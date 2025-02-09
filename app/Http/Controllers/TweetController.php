<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function store()
    {
        $tweet = new Tweet([
            'content' => request()->get('tweet', ''),
        ]);
        $tweet->save();

        return redirect()->route('dashboard');
    }
}
