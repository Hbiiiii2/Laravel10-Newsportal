<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    // relasi Category ke Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
