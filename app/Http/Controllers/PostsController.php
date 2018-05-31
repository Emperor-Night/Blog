<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    protected $rules = [
        "title"       => "required|max:255",
        "content"     => "required",
        "category_id" => "required|integer",
        "tags"        => "required"
    ];

    public function index()
    {
        $posts = Post::withTrashed()->addedRelations()->latest()->paginate(5);
        return view("admin.posts.index", compact("posts"));
    }

    public function create()
    {
        $categories = Category::pluck("name", "id")->all();
        $tags = Tag::all();

        if (!$categories) {
            if (!$tags->count()) {
                session()->flash("info", "You must create category and tag first !");
            } else {
                session()->flash("info", "You must create category first !");
            }
            return redirect()->route("categories.create");
        }
        if (!$tags->count()) {
            return redirect()->route("tags.create")->withInfo("You must create tag first !");
        }

        return view("admin.posts.form", compact("categories", "tags"));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, $this->rules);
        $request->validate(["title" => "unique:posts"]);
        $data['slug'] = str_slug($data['title']);

        $post = new Post($data);
        $post->checkForPhoto($request);

        $post = auth()->user()->publish($post);
        $post->tags()->attach($request->tags);

        return back()->withSuccess("Post created successfully !");
    }

    public function edit($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $categories = Category::pluck("name", "id")->all();
        $tags = Tag::all();
        return view("admin.posts.form", compact("post", "categories", "tags"));
    }

    public function update(Request $request, $id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        $data = $this->validate($request, $this->rules);
        $request->validate(["title" => "unique:posts,title," . $post->id]);

        $data['slug'] = str_slug($data['title']);
        $post->checkForPhoto($request, "update");

        $post->update($data);
        $post->tags()->sync($request->tags);

        return redirect()->route("posts.index")
            ->withSuccess("Post updated successfully !");
    }

    public function destroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->delete();
        return back()->withSuccess("Post trashed successfully !");
    }


    // Additional methods
    public function trashed()
    {
        $posts = Post::onlyTrashed()->latest()->paginate(5);
        return view("admin.posts.trashed", compact("posts"));
    }

    public function trashedRestore($id)
    {
        Post::onlyTrashed()->findOrFail($id)->restore();
        return back()->withSuccess("Post restored successfully !");
    }

    public function permanentDestroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        $post->deletePhoto();
        $post->forceDelete();

        return back()->withSuccess("Post deleted forever !");
    }

    public function comments($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $comments = $post->comments()->addedRelations()->latest()->paginate(5);
        return view("admin.posts.comments", compact("comments", "post"));
    }


}
