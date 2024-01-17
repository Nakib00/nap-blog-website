<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Str; // Import the Str facade

class CategoryController extends Controller
{
    //open add category page
    public function admin_categoryAdd()
    {

        return view('admin.admin_category_add');
    }

    //store category
    public function storeCategory(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255|string',
            'customRadio' => 'required|in:active,deactive',
        ]);

        // Generate a unique slug based on the name
        $slug = Str::slug($data['name']);

        // Check if the slug already exists
        if (Category::where('slug', $slug)->exists()) {
            return redirect()->back()->with('error', 'Category with this name already exists.');
        }

        // Create a new category instance with the validated data
        $category = Category::create([
            'name' => $data['name'],
            'status' => ($data['customRadio'] == 'active') ? '1' : '0', // Convert to '1' or '0'
            'slug' => $slug,
        ]);

        return redirect(route('admin.catrgory.add'))->with('success', 'Category added successfully.');
    }

    // Change status
    public function changestatus($id, $status)
    {
        $category = Category::findOrFail($id);
        $category->status = $status;
        $category->save();

        return redirect(route('admin.catrgory'))->with('success', 'Category status changed successfully.');
    }
    // open edit page
    public function admin_categoryedit($id)
    {
        $categoryData = Category::findOrFail($id);
        return view('admin.admin_category_edit', ['categoryData' => $categoryData]);
    }
    //Update catagory
    public function admin_categoryUpdate(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|max:255|string',
        ]);

        // Generate a unique slug based on the name
        $slug = Str::slug($data['name']);


        // Check if the slug already exists
        if (Category::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            return redirect()->back()->with('error', 'Category with this name already exists.');
        }

        // Update the category data
        $category = Category::findOrFail($id);
        $category->update($data);

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    //Category delete
    public function category_delete($id)
    {
        $category = category::findOrFail($id);
        $category->delete();

        return redirect(route('admin.catrgory'))->with('success', 'Delete Teams successfully.');
    }
}
