<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function show(Category $category)
    {
        return view('category.show', ['category' => $category]);
    }

    public function create()
    {
        return view('category.add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $category = new Category();
        $category->title = $data['title'];
        $category->description = $data['description'];
        $category->slug = Str::slug($data['title'], '-');
        $category->save();

        return redirect()->route('home');
    }
}
