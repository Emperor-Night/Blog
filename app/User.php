<?php

namespace App;

use App\TraitsHelpers\PhotoHelper;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use PhotoHelper;

    protected $fillable = ['name', 'slug', 'email', 'password', 'is_admin', "photo_id", "about", "facebook", "youtube"];
    protected $hidden = ['password', 'remember_token'];

    public $storagePath = "/public/images/users/";
    public $photoPath = "/storage/images/users/";


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function publish($post)
    {
        return $this->posts()->save($post);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }


    // Custom methods
    public function scopeAddedRelations($query)
    {
        $query->with(["photo", "comments", "posts" => function ($query) {
            $query->withTrashed();
        }]);
    }


}
