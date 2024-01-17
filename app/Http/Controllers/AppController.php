<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{about, team, contact, message};

class AppController extends Controller
{
    public function index()
    {
        return view('home');
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
    public function post()
    {
        return view('post');
    }
}
