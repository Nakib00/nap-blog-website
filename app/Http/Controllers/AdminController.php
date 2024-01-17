<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{about, team, contact, message, category, singlePageBlog};

class AdminController extends Controller
{
    //open about page
    public function admin_about()
    {
        $aboutData = about::all();
        $team = team::all();
        return view('admin.admin_blog', ['aboutData' => $aboutData, 'team' => $team]);
    }

    //Team add section open
    public function addTeam()
    {
        return view('admin.admin_team');
    }

    //Contact section open
    public function admin_contact()
    {
        $contactData = contact::all();
        return view('admin.admin_contact', ['contactData' => $contactData]);
    }
    //Message section open
    public function admin_message()
    {
        $messageData = message::all();
        return view('admin.admin_messag', ['messageData' => $messageData]);
    }

    //Category section open
    public function admin_category()
    {
        $categories = Category::all();
        return view('admin.admin_category', ['categories' => $categories]);
    }

    //Blog section open
    public function admin_blog()
    {
        $blogs = singlePageBlog::all();
        return view('admin.admin_singleBlog',['blogs' => $blogs]);
    }
}
