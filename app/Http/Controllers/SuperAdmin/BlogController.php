<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use App\Notifications\NewBlogUploaded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::latest()->paginate(6);
        $randomBlogs = Blog::inRandomOrder()->limit(3)->get();

        return view('superAdmin.blog-board', [
            'blogs' => $blogs,
            'randomBlogs' => $randomBlogs
        ]);
    }

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

        $users = User::where('id', '!=', $user->id)
            ->whereIn('role', ['donor', 'ward_operator', 'blood_bank_admin'])
            ->whereNotNull('email_verified_at')
            ->get();

        Notification::send($users, new NewBlogUploaded($blog));

        return back()->with('success', 'New blog is uploaded successfully.');
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'image' => ['required', 'image', 'file']
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($blog->image);
            $path = $request->file('image')->store('blogs', 'public');
        }

        $blog->title = $validated['title'];
        $blog->body = $validated['body'];
        $blog->image = $path;
        $blog->update();

        return back()->with('success', 'Blog is updated successfully.');
    }

    public function destroy(Blog $blog)
    {

        Storage::disk('public')->delete($blog->image);

        $blog->delete();

        return back()->with('success', 'Blog deleted successfully.');
    }
}
