<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{about, team, contact, message, category, comment, singlePageBlog};

class AdminController extends Controller
{
    //index
    public function adminIndex()
    {

        $blogs = singlePageBlog::all();
        $comments = comment::all();
        $categories = category::all();
        return view('admin.admin_index', ['blogs' => $blogs,'Comments'=>$comments,'categories'=>$categories ]);
    }

    //open about paged
    public function admin_about()
    {
        $aboutData = about::all();
        $team = team::all();
        return view('admin.about.admin_blog', ['aboutData' => $aboutData, 'team' => $team]);
    }

    //Team add section open
    public function addTeam()
    {
        return view('admin.team.admin_team');
    }

    //Contact section open
    public function admin_contact()
    {
        $contactData = contact::all();
        return view('admin.contact.admin_contact', ['contactData' => $contactData]);
    }
    //Message section open
    public function admin_message()
    {
        $messageData = message::all();
        return view('admin.message.admin_messag', ['messageData' => $messageData]);
    }

    //Category section open
    public function admin_category()
    {
        $categories = Category::all();
        return view('admin.category.admin_category', ['categories' => $categories]);
    }

    //Blog section open
    public function admin_blog()
    {

        $blogs = singlePageBlog::all();
        return view('admin.blog.admin_singleBlog', ['blogs' => $blogs]);
    }
}
