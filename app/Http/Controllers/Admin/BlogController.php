<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use App\Notifications\NewBlogUploaded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'image' => ['required', 'image', 'file']
        ]);

        $validated['user_id'] = $user->id;

        $path = $request->file('image')->store('blogs', 'public');

        $validated['image'] = $path;

        $blog = Blog::create($validated);

        // User::where('id', '!=', $user->id)
        //     ->chunk(5, function ($users) use ($blog) {
        //         Notification::send($users, new NewBlogUploaded($blog));
        //     });

        $users = User::where('id', '!=', $user->id)->get();

        Notification::send($users, new NewBlogUploaded($blog));

        return back()->with('success', 'New blog is uploaded successfully.');
    }
}
