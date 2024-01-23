<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{category, singlePageBlog, Comment};


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
        $blogdata = singlePageBlog::findOrFail($id);
        $categoryData = Category::all();
        return view('admin.blog.admin_singleBlogEdit', ['blogdata' => $blogdata, 'categoryData' => $categoryData]);
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
        //find all comments under the blog
        $comments = Comment::where('blog_post_id', $id)->get();

        return view('admin.blog.admin_singleBlogDetail', ['blogs' => $blogs, 'categories' => $categories, 'user' => $user, 'comments' => $comments]);
    }

    //update blog post
    public function admin_blogupdate($id, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255|string',
            'description' => 'required|string',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => 'required|array',
        ]);

        // Retrieve the existing blog post by ID
        $blogpost = singlePageBlog::findOrFail($id);

        // Check if a new image file is uploaded
        if ($request->has('file')) {
            // Upload the new image file
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/blog/post';
            $file->move($path, $filename);

            // Save the file path in the database
            $data['image'] = $path . '/' . $filename;

            // If there was an existing image, you can keep it by commenting out the following line:
            // Storage::delete($blogpost->image);
        }

        // Update the existing blog post attributes
        $blogpost->update([
            'title' => $data['title'],
            'image' => $data['image'] ?? $blogpost->image, // Use the new image path or the existing one
            'description' => $data['description'],
            'user_id' => auth()->user()->id,
            'category_ids' => $data['categories'],
        ]);

        return redirect()->back()->with('success', 'Blog post updated successfully.');
    }

    // Change status of blog post
    public function statusChange($id, $status)
    {
        $blog = singlePageBlog::findorFail($id);
        $blog->status = $status;
        $blog->save();

        return redirect()->back()->with('success', 'Blog post status change successfully.');
    }
    // show blog post in Home page
    public function shwoHome($id, $show)
    {
        $blog = singlePageBlog::findorFail($id);
        $blog->show_on_home = $show;
        $blog->save();

        return redirect()->back()->with('success', 'Blog post Shown status change successfully.');
    }

    //Delete blog post
    public function blog_delete($id)
    {
        $blogpost = singlePageBlog::findorFail($id);
        $blogpost->delete();

        return redirect()->back()->with('success', 'Delete Blog successfully.');
    }
}
