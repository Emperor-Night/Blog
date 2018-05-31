<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Validator;

class TagsController extends Controller
{

    protected $rules = [
        "name" => "required|max:255"
    ];

    public function index()
    {
        $tags = Tag::addedRelations()->paginate(5);
        return view("admin.tags.index", compact("tags"));
    }

    public function create()
    {
        return view("admin.tags.form");
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules);
        $request->validate(["name" => "unique:tags"]);

        $data["slug"] = str_slug($data["name"]);

        Tag::create($data);

        return back()->withSuccess("Tag created successfully !");
    }

    public function edit(Tag $tag)
    {
        return view("admin.tags.form", compact("tag"));
    }

    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate($this->rules);
        $request->validate(["name" => "unique:tags,name," . $tag->id]);

        $data["slug"] = str_slug($data["name"]);

        $tag->update($data);

        return redirect()->route("tags.index")
            ->withSuccess("Tag updated successfully !");
    }

    public function destroy(Tag $tag)
    {
        foreach ($tag->posts()->withTrashed()->get() as $post) {
            $post->deletePhoto();
        }

        $tag->delete();

        return back()->withSuccess("Tag and all associated posts deleted successfully !");
    }


    // Additional methods
    public function posts(Tag $tag)
    {
        $posts = $tag->posts()->withTrashed()->addedRelations()->latest()->paginate(5);
        return view("admin.tags.posts", compact("posts", "tag"));
    }


}
