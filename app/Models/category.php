<?php

namespace App\Models;

use App\Models\singlePageBlog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'status', 'slug',
    ];

    public function blogPosts()
    {
        return $this->belongsToMany(singlePageBlog::class);
    }
}
