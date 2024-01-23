<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{about, team, contact, message, category, singlePageBlog,comment};

class AppController extends Controller
{
    public function index()
    {
        $blogs = singlePageBlog::all();
        return view('home',['blogs' => $blogs]);
    }
    //open about page
    public function about()
    {
        $aboutData = about::all();
        $teamData = team::all();
        return view('about', ['aboutData' => $aboutData], ['teamData' => $teamData]);
    }
    //open contact page
    public function contact()
    {
        $contactData = contact::all();
        return view('contact', ['contactData' => $contactData]);
    }
    //store message
    public function storemessage(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email',
            'subject' => 'required|max:255|string',
            'message' => 'nullable'
        ]);

        $message = message::create($data);

        return redirect(route('contact'))->with('success', 'Message send successfully.');
    }
    //open single post
    public function post($id)
    {
        $category = category::all();
        $blog = singlePageBlog::findOrFail($id);
        $user = $blog->user;

        $categoryIds = $blog->category_ids;
        $categories = Category::whereIn('id', $categoryIds)->get();

        //find all comments under the blog
        $comments = Comment::where('blog_post_id', $id)->get();

        return view('post', ['category' => $category, 'blog' => $blog, 'user' => $user, 'categories' => $categories, 'comments' => $comments]);
    }

    //Blog comment
    public function comment(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
            'blog_id' => 'required|exists:single_page_blogs,id',
        ]);

        // Create a new comment instance
        $comment = Comment::create([
            'blog_post_id' => $data['blog_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'comment' => $data['comment'],
        ]);

        return redirect()->back()->with('success', 'Comment post successfully.');
    }
}
