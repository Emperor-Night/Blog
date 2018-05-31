<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $fillable = ["name", "size"];


    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }


    // Custom methods
    public function getPhotoPath()
    {
        if ($this->post) {
            return $this->post->getPhotoPath();
        } elseif ($this->user) {
            return $this->user->getPhotoPath();
        } else {
            return "http://via.placeholder.com/70x70";
        }
    }

    public function getStoragePath()
    {
        if ($this->post) {
            return $this->post->getStoragePath();
        } elseif ($this->user) {
            return $this->user->getStoragePath();
        }
    }

    public function deletePhotoFile()
    {
        if (file_exists(public_path() . $this->getPhotoPath())) {
            Storage::delete($this->getStoragePath());
        }
    }


    // Custom methods
    public function scopeAddedRelations($query)
    {
        $query->with(["user.photo", "post" => function ($query) {
            $query->withTrashed()->with("photo");
        }]);
    }


}
