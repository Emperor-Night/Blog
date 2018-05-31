<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ["body", "user_id", "post_id", "category_id", "status"];


    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Custom methods
    public function scopeAddedRelations($query)
    {
        $query->with(["user", "category", "post" => function ($query) {
            $query->withTrashed();
        }]);
    }


}
