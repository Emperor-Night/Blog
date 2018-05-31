<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ["name", "slug"];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }


    // Custom methods
    public function scopeAddedRelations($query)
    {
        $query->with(["comments", "posts" => function ($query) {
            $query->withTrashed();
        }]);
    }


}
