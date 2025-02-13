<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $tweets = $user->tweets()->paginate(10);
    
        return view('users.show', compact('user', 'tweets')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true;
    
        $tweets = $user->tweets()->paginate(10);

        return view('users.edit', compact('user', 'editing', 'tweets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $validated = request()->validate([
            'name' => 'required|min:2|max:40',
            'bio' => 'nullable|max:255',
            'image' => 'image'
        ]);

        if (request()->has('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
            Storage::disk('public')->delete($user->image);
        }

        $user->update($validated);

        return redirect()->route('profile');

    }

    public function profile()
    {

        return $this->show(Auth::user());
    }
}
