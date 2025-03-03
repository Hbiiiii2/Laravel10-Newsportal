<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('app.about.index', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|max:50',
            'description' => 'required|max:5000',
        ]);

        $about = About::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/about', $imageName);
            $about->image = Storage::url($imagePath);
        }

        $about->title = $request->title;
        $about->description = $request->description;
        $about->save();

        return redirect()->back()->with('success', 'About berhasil diperbarui');
    }

    public function creator()
    {
        $about = About::first();
        return view('app.dashboard.about', compact('about'));
    }
}
