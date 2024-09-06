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
            $path = $request->file('image')->store('public/categories');

            Category::create([
                'name'=> $request->name,
                'slug'=> Str::slug($request->name),
                'image'=> $path
            ]);

            return redirect()->route('admin.categories.index')->with('message', 'Kategorija je kreirana');
        }
        dd('no image');
        
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        if($request->hasFile('image')){
            $path = $request->file('image')->store('public/categories');

            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $path
            ]);
            return redirect()->route('admin.categories.index')->with('message', 'Kategorija ažurirana novom slikom');

        }else {
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);
            return redirect()->route('admin.categories.index')->with('message', 'Kategorija ažurirana');
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('message', 'Kategorija obrisana');
    }

    public function add_sub(Category $category)
    {
        return view('admin.categories.add_sub', compact('category'));
    }

    public function add_sub_store(Request $request, Category $category)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/subcategories');

            $category->sub_categories()->create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $category->id,
                'image' => $path
            ]);

            return redirect()->route('admin.categories.index')->with('message', 'Potkategorija je kreirana.');
            ;
        }
        dd('Nema sliku');
    }
}