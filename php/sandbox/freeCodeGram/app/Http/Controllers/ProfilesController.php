<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Image;

class ProfilesController extends Controller
{

    /**
     * Show a user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image'
        ]);

        if (request('image')) {
            $image_path = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/$image_path"))->fit(1000, 1000);
            $image->save();
        }

        // profile changes can only be applied under the authenticated user
        auth()->user()->profile()->update(array_merge(
            $data,
            ['image' => ($image_path ?? '')]
        ));

        return redirect(route('profile.show', $user->id));
    }
}
