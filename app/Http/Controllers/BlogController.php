<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{category, singlePageBlog};


class BlogController extends Controller
{
    //open add post section
    public function admin_blogAdd()
    {
        $categoryData = Category::all();
        return view('admin.blog.admin_singleBlogAdd', ['categoryData' => $categoryData]);
    }

    //store the post
    public function admin_blogstore(Request $request)
    {

        $data = $request->validate([
            'title' => 'required|max:255|string',
            'description' => 'required|string',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => 'required|array',
            'customRadio' => 'required|in:active,deactive',
        ]);

        if ($request->has('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;
            $path = 'uploads/blog/post';
            $file->move($path, $filename);

            // Save the file path in the database
            $data['image'] = $path . '/' . $filename;
        }

        // Create a new category instance with the validated data
        $blogpost = singlePageBlog::create([
            'title' => $data['title'],
            'image' => $data['image'],
            'description' => $data['description'],
            'user_id' => auth()->user()->id,
            'category_ids' => $data['categories'],
            'status' => ($data['customRadio'] == 'active') ? '1' : '0', // Convert to '1' or '0'
            'show_on_home' => false, // Set the default value, you may modify as needed
        ]);

        return redirect()->back()->with('success', 'Blog post added successfully.');
    }

    //open blog edit page
    public function admin_blogedit($id)
    {
        return view('admin.blog.admin_singleBlogEdit');
    }

    //Show blog details page
    public function admin_blogDetails($id)
    {
        $blogs = singlePageBlog::findOrFail($id);

        // Use the $categoryIds array to retrieve the associated categories
        $categoryIds = $blogs->category_ids;
        $categories = Category::whereIn('id', $categoryIds)->get();
        // Retrieve the associated user
        $user = $blogs->user;

        return view('admin.blog.admin_singleBlogDetail', ['blogs' => $blogs, 'categories' => $categories,'user'=>$user]);
    }
}
