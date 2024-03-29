<?php

namespace App\Models;

use App\Models\{user,category,comment};


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class singlePageBlog extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'user_id', 'category_ids', 'status', 'show_on_home',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'category_ids' => 'json', // Cast the column to JSON
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
