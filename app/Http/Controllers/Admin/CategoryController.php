<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(12);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('categories');

            Category::create([
                'name'=> $request->name,
                'slug'=> Str::slug($request->name),
                'image'=> $path
            ]);

            return redirect()->route('categories.index');
        }
        dd('no image');
        
    }
}