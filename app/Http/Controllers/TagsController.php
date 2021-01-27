<?php

namespace App\Http\Controllers;

use App\Models\Tag;

use Illuminate\Http\Request;

use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;

class tagsController extends Controller
{
    public function index() {
        return view('tags.index')->with('tags', Tag::all());
    }

    public function create() {
        return view('tags.create');
    }

    public function store(CreateTagRequest $request) {
    
        Tag::create([
            'name'=>$request->name
        ]);

        session()->flash('success', 'Tag created successfully!');

        return redirect(route('tags.index'));
    }

    public function edit(Tag $tag) {
        return view('tags.create')->with('tag', $tag);
    }

    public function update(UpdateTagRequest $request) {

        Tag::where('id', $request->id)->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Tag updated successfully!');

        return redirect('/tags');
    }


    public function destroy(Tag $tag) {
        $tag->delete();
        session()->flash('success', 'Tag deleted successfully!');
        return redirect('/tags');
    }
}
