<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // Make sure to import the Contact model

class ContactController extends Controller
{

    public function index()
{
    $contacts = Contact::all();
    return view('admin.contact.contact', compact('contacts'));
}

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Create a new Contact instance and fill it with the validated data
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;

        // Save the contact record to the database
        $contact->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Message sent successfully.');
    }

    public function destroy($id)
{
    $contact = Contact::findOrFail($id);
    $contact->delete();

    return redirect()->route('contact.index')->with('success', 'Message deleted successfully.');
}

}
