<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;

class ContactController extends Controller
{
    //open edit page
    public function contact_edit($id)
    {

        $contactData = contact::findOrFail($id);
        return view('admin.contact.admin_contact_edit', ['contactData' => $contactData]);
    }

    //update contact data
    public function contact_update(Request $request, $id)
    {
        $data = $request->validate([
            'address' => 'required|max:255|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'map' => 'required|url',
        ]);

        $contact = contact::findOrFail($id);
        $contact->update($data);

        return redirect(route('admin_contact'))->with('success', 'Contact page updated successfully.');
    }
}
