<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\singlePageBlog;

class comment extends Model
{
    use HasFactory;
    protected $fillable = ['name','email', 'blog_post_id', 'comment'];

    public function blogPost()
    {
        return $this->belongsTo(singlePageBlog::class);
    }
}
