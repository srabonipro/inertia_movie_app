<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        return Inertia::render('Tag/Index', [
            'tags' => Tag::paginate(5)
        ]);
    }

    public function create()
    {
        return Inertia::render('Tag/Create');
    }

    public function store(Request $request)
    {
        Tag::create([
            'tag_name' => $request->tagName,
            'slug' => Str::slug($request->tagName),
        ]);

        return redirect()->route('admin.tags.index')->with('flash.banner', 'Tag has created successfully!');
    }
}
