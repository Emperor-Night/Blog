<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Tag;
use App\Category;
use App\Photo;
use App\User;

class DashboardController extends Controller
{

    public function index()
    {
        $totalPosts = Post::withTrashed()->count();
        $totalTrashedPosts = Post::onlyTrashed()->count();
        $totalComments = Comment::count();
        $totalTags = Tag::count();
        $totalCategories = Category::count();
        $totalPhotos = Photo::count();
        $totalUsers = User::count();

        return view("admin.welcome",
            compact(
                "totalPosts", "totalTrashedPosts", "totalComments", "totalTags",
                "totalCategories", "totalPhotos", "totalUsers"
            ));
    }


}
