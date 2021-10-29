<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $cats = Category::all();
        return view('categories.indexCat', compact('cats'));
    }

    public function create()
    {
        return view('categories.createCat');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name'=>['required', 'max:255'],
        ]);
        Category::create(['name'=>$request->input('category_name')]);
        return redirect()->route('categories.index')->with('message', 'You successfully created category');
    }

    public function show(Category $category)
    {
        return view('categories.showCat')->with('cat', $category);
    }

    public function edit(Category $category)
    {
        return view('categories.editCat')->with('cat', $category);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name'=>['required', 'max:255'],
        ]);

//        dd($request);
//        dd($request->input('category_name'));
//        dd($category);
        $category->update([
            'name'=>$request->input('category_name'),
//            'category_id'=>$request->input('category_id'),
        ]);
        return redirect()->route('categories.index')->with('message', 'You successfully updated category');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('message', 'You successfully deleted category');
    }
}
