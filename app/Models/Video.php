<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'uid';
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }


    public function getThumbnailAttribute()
    {
        if($this->thumbnail_image)
        {
            return '/videos/' . $this->uid . '/' . $this->thumbnail_image;
        }
        return '/videos/' . 'default.jpg';
    }

    public function likes()
    {
        return $this->hasMany(Likes::class);
    }
    public function dislikes()
    {
        return $this->hasMany(Dislikes::class);
    }
    public function liked()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }
    public function disliked()
    {
        return $this->dislikes()->where('user_id', auth()->id())->exists();
    }
}
