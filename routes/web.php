<?php

Auth::routes();

Route::get('/', "FrontEndController@index");
Route::get('/post/{post}', "FrontEndController@single")->name("post.single");
Route::get('/category/{category}/posts', "FrontEndController@category")->name("category.single");
Route::get('/tag/{tag}/posts', "FrontEndController@tag")->name("tag.single");
Route::get('/author/{user}/posts', "FrontEndController@user")->name("user.single");
Route::get('/results', "FrontEndController@results")->name("results");
Route::post('/subscribe', "FrontEndController@subscribe")->name("subscribe");


Route::group(["prefix" => "admin", "middleware" => "auth"], function () {

    Route::get('/dashboard', 'DashboardController@index')->name("dashboard");

    Route::get('/settings', "SettingsController@edit")->name("settings.edit");
    Route::patch('/settings', "SettingsController@update")->name("settings.update");

    Route::get('/users/profile', "UsersController@profile")->name("users.profile");
    Route::patch('/users/profile', "UsersController@profileUpdate")->name("users.profile.update");

    Route::patch('/users/{user}/makeAdmin', "UsersController@makeAdmin")->name("users.make.admin");
    Route::patch('/users/{user}/removeAdmin', "UsersController@removeAdmin")->name("users.remove.admin");

    Route::patch('/comments/{comment}/approve', "CommentsController@approveComment")->name("comments.approve");
    Route::patch('/comments/{comment}/unApprove', "CommentsController@unApproveComment")->name("comments.unApprove");

    Route::get("/photos", "PhotosController@index")->name("photos.index");
    Route::delete("/photos/{photo}", "PhotosController@destroy")->name("photos.destroy");


    Route::get('/users/{user}/comments', "UsersController@comments")->name("users.comments");
    Route::get('/posts/{id}/comments', "PostsController@comments")->name("posts.comments");
    Route::get('/category/{category}/comments', "CategoriesController@comments")->name("categories.comments");


    Route::get('/users/{user}/posts', "UsersController@posts")->name("users.posts");
    Route::get('/tags/{tag}/posts', "TagsController@posts")->name("tags.posts");
    Route::get('/categories/{category}/posts', "CategoriesController@posts")->name("categories.posts");


    Route::get('/posts/trashed', "PostsController@trashed")->name("posts.trashed");
    Route::patch('/posts/trashed/{id}/restore', "PostsController@trashedRestore")->name("posts.trashed.restore");
    Route::delete('/posts/{id}/permanentDestroy', "PostsController@permanentDestroy")->name("posts.permanent.destroy");


    Route::delete('/categories/bulkDestroy', "CategoriesController@bulkDestroy")->name("categories.bulk.destroy");
    Route::delete('/comments/bulkDestroy', "CommentsController@bulkDestroy")->name("comments.bulk.destroy");
    Route::delete("/photos/bulkDestroy/photos", "PhotosController@bulkDestroy")->name("photos.bulk.destroy");


    Route::resources([
        "posts"      => "PostsController",
        "categories" => "CategoriesController",
        "tags"       => "TagsController",
        "users"      => "UsersController",
        "comments"   => "CommentsController"
    ]);


});