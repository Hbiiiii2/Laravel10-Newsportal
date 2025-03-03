<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        if (Gate::denies('admin-fitur')) {
            abort(403, 'Lagi Mencari APA Bro!.');
        }


        $currentUser = auth()->user();
        $categoriesQuery = Category::orderBy('updated_at', 'desc');

        if ($currentUser->role->name == 'admin') {

        } else {
            $categoriesQuery->where('user_id', $currentUser->id);
        }

        $categories = $categoriesQuery->paginate(5);

        return view('app.category.index', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5);

    }



    public function edit($slug)
    {
        if (Gate::denies('admin-fitur')) {
            abort(403, 'Lagi Mencari APA Bro!.');
        }

        $category = Category::where('slug', $slug)->firstOrFail();

        return view('app.category.edit', compact('category'));
    }


    public function update(Request $request, $slug)
    {
        if (Gate::denies('admin-fitur')) {
            abort(403, 'Lagi Mencari APA Bro!.');
        }

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|max:255',
        ]);

        $category = Category::where('slug', $slug)->firstOrFail();

        $category->name = $request->name;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($category->image) {
                Storage::delete(str_replace('/storage', 'public', $category->image));
            }

            // Simpan gambar baru
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/categories', $imageName);

            // Simpan path gambar di database
            $category->image = Storage::url($imagePath);
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }


    public function store(Request $request)
    {
        if (Gate::denies('admin-fitur')) {
            abort(403, 'Lagi Mencari APA Bro!.');
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|max:255',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('public/categories', $imageName);

        $category->image = Storage::url($imagePath);

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroy($slug)
    {
        if (Gate::denies('admin-fitur')) {
            abort(403, 'Lagi Mencari APA Bro!.');
        }
        
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = Post::where('category_id', $category->id)->get();

        foreach ($posts as $post) {
            if ($post->image) {
                Storage::delete(str_replace('/storage', 'public', $post->image));
            }
            $post->delete();
        }

        if ($category->image) {
            Storage::delete(str_replace('/storage', 'public', $category->image));
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }



}
