<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $posts = $user->posts()->latest()->paginate(10); 

        return view('profiles.show', compact('user', 'posts'));
    }

    public function edit($username)
    {
        $user = auth()->user();

        if ($user->username !== $username) {
            abort(403, 'Unauthorized access');
        }

        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, $username)
    {
        $user = auth()->user();

        if ($user->username !== $username) {
            abort(403, 'Unauthorized access');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:500',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->name = $request->input('name');
        $user->bio = $request->input('bio');
        $user->save();

        return redirect()->route('profile.show', ['username' => $username])->with('success', 'Profile updated successfully');
    }
}
