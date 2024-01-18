<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\about;

class AboutController extends Controller
{
    //
    //edit about
    public function about_edit($id)
    {
        $aboutData = About::findOrFail($id);

        return view('admin.about.admin_blog_edit', ['aboutData' => $aboutData]);
    }
    //update edited itame
    public function about_update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|max:255|string',
            'file' => 'nullable|mimes:png,jpg,jpeg,webp',
            'description' => 'nullable'
        ]);

        if ($request->has('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;
            $path = 'uploads/aboutImage';
            $file->move($path, $filename);

            // Save the file path in the database
            $data['image'] = $path . '/' . $filename;
        }

        $about = About::findOrFail($id);
        $about->update($data);

        return redirect(route('admin_about'))->with('success', 'About page updated successfully.');
    }
}
