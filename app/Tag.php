<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ["name", "slug"];


    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }


    // Custom methods
    public function scopeAddedRelations($query)
    {
        $query->with(["posts" => function ($query) {
            $query->withTrashed();
        }]);
    }


}
