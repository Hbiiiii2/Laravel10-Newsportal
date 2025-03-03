<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $currentUser = auth()->user();
        $postsQuery = Post::orderBy('updated_at', 'desc');

        if ($currentUser->role->name == 'admin') {

        } else {
            $postsQuery->where('user_id', $currentUser->id);
        }

        $posts = $postsQuery->paginate(10);

        return view('app.posts.index', compact('posts'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('app.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|max:200',
            'body' => 'required|max:5000',
            'category_id' => 'required'
        ]);

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->category_id = $validatedData['category_id'];
        $post->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/posts', $imageName);
            $post->image = Storage::url($imagePath);
        }

        $post->slug = Str::slug($validatedData['title'], '-');

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Postingan berhasil dipublish');
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Category::latest()->get();
        return view('app.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $slug)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|max:50',
            'body' => 'required|max:5000',
            'category_id' => 'required'
        ]);

        $post = Post::where('slug', $slug)->firstOrFail();
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->category_id = $validatedData['category_id'];
        $post->updated_at = now();

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete(str_replace(url('/'), '', $post->image));
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/posts', $imageName);
            $post->image = Storage::url($imagePath);
        }

        $post->slug = Str::slug($validatedData['title'], '-');

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Postingan berhasil diupdate');
    }

    public function show()
    {
        // return view('app.posts.show');
    }

    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        if ($post->image) {
            Storage::delete(str_replace(url('/'), '', $post->image));
        }
        $post->breakingNews()->delete();
        $post->comments()->delete();
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Postingan berhasil dihapus');
    }


}
