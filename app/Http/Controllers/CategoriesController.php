<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        return view('categories.index')->with('categories', Category::all());
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request) {
        
        $this->validate(request(), [
            'name' => 'required|unique:categories'
        ]);

        Category::create([
            'name'=>$request->name
        ]);
        
        session()->flash('success', 'Category created successfully!');

        return redirect(route('categories'));
    }

    public function edit(Category $category) {
        return view('categories.edit')->with('category', $category);
    }

    public function update(Category $category) {

        $this->validate(request(), [
            'name' => 'required'
        ]);
        $data = request()->all();
        

        $category->name = $data['name'];

        $category->save();
        session()->flash('success', 'category updated successfully!');

        return redirect('/categories');
    }


    public function delete(Category $category) {
        $category->delete();
        session()->flash('success', 'Category deleted successfully!');
        return redirect('/categories');
    }
}
