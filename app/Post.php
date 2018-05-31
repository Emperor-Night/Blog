<?php

namespace App;

use App\TraitsHelpers\PhotoHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use PhotoHelper;

    protected $dates = ["deleted_at"];
    protected $fillable = ["title", "slug", "content", "photo_id", "user_id", "category_id"];

    public $storagePath = "/public/images/posts/";
    public $photoPath = "/storage/images/posts/";


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
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
        $query->with(["user", "category", "photo", "comments"]);
    }

    public function scopeFrontRelations($query)
    {
        $query->with(["photo"]);
    }

    public function scopeSimilar($query)
    {
        $query->where("title", "like", '%' . request('query') . '%');
    }


}
