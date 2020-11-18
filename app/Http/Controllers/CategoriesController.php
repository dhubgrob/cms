<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    public function index() {
        return view('categories.index')->with('categories', Category::all());
    }

    public function create() {
        return view('categories.create');
    }

    public function store(CreateCategoryRequest $request) {
    
        Category::create([
            'name'=>$request->name
        ]);

        session()->flash('success', 'Category created successfully!');

        return redirect(route('categories'));
    }

    public function edit(Category $category) {
        return view('categories.create')->with('category', $category);
    }

    public function update(UpdateCategoryRequest $request) {

        Category::where('id', $request->id)->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'category updated successfully!');

        return redirect('/categories');
    }


    public function delete(Category $category) {
        $category->delete();
        session()->flash('success', 'Category deleted successfully!');
        return redirect('/categories');
    }
}
