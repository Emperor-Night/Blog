<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{

    public function index()
    {
        $title = "My Blog";
        $categories = Category::with(["posts.photo"])->latest()->take(3)->get();
        $posts = Post::with(["photo", "category"])->latest()->take(3)->get();

        $count = $posts->count();
        if ($count >= 1) {
            $latestPost = $posts[0];
            if ($count >= 2) {
                $secondPost = $posts[1];
                if ($count >= 3) {
                    $thirdPost = $posts[2];
                }
            }
        } else {
            $latestPost = $secondPost = $thirdPost = null;
        }

        return view("front.welcome", compact("title", "categories", "latestPost", "secondPost", "thirdPost"));
    }

    public function single(Post $post)
    {
        $prevID = Post::where("id", "<", $post->id)->max('id');
        $nextID = Post::where("id", ">", $post->id)->min('id');
        $prevPost = Post::find($prevID);
        $nextPost = Post::find($nextID);

        $tags = Tag::all();
        $title = $post->title;

        return view("front.singlePost", compact("title", "post", "prevPost", "nextPost", "tags"));
    }

    public function category(Category $category)
    {
        $posts = $category->posts()->frontRelations()->get();
        return view("front.uniPosts", compact("category", "posts"));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->frontRelations()->get();
        return view("front.uniPosts", compact("tag", "posts"));
    }

    public function user(User $user)
    {
        $posts = $user->posts()->frontRelations()->get();
        return view("front.uniPosts", compact("user", "posts"));
    }

    public function results()
    {
        $posts = Post::similar()->frontRelations()->get();
        return view("front.uniPosts", compact("posts"));
    }

    public function subscribe(Request $request)
    {
        $data = $request->validate([
            "email" => "required|email|max:255"
        ]);

        Mail::to($data["email"])->send(new \App\Mail\SubscriptionMail());

        return back()->withSuccess("You subscribed successfully !");
    }


}
