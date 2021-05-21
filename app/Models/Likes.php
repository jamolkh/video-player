<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
