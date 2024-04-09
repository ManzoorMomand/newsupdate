<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Author;
use Hash;
use Auth;
use App\Mail\Websitemail; 

class AdminAuthorController extends Controller
{
    public function show(){

        $authors = Author::get();
    return view ('admin.Author.author_show', compact('authors'));

    }
    public function create(){
        return view ('admin.Author.create');
    }
    public function store(Request $request) {
        $author = new Author();
    
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:authors,email',
            'password' => 'required',
            'retype_password' => 'required|same:password',
            'photo' => 'image|mimes:jpg,jpeg,png,gif'
        ]);
    
        if ($request->hasFile('photo')) {
            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'author_photo_' . $now . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $author->photo = $final_name;
        }
    
        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        $author->token = '';
        $author->save();
    
        $subject = 'Contact Form from website';
        $message = 'please change password befor login:<br>';
        $message .= '<a href="' . route('admin_login') . '">';
        $message .= 'Click on this Link';
        $message .= '</a>';
        $message .= '<br><br> Plese see your Password here and after login  change that: <br>';
        $message .= $request->password;
        \Mail::to($request->email)->send(new Websitemail($subject, $message));
    
        return redirect()->route('admin_author_show')->with('success', 'Data stored Successfully');
    }
    
    public function edit($id){

        $authors_data = Author::where('id', $id)->first();
        return view('admin.Author.author_edit', compact('authors_data'));

    }

    
    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);
    
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique((new Author())->getTable())->ignore($author->id),
            ],
            'password' => 'nullable|min:6', // Allow password to be nullable and have minimum 6 characters
            'retype_password' => 'same:password', // Make sure retype_password matches password if provided
            'photo' => 'image|mimes:jpg,jpeg,png,gif' // Combined validation rules for 'photo'
        ]);
    
        if ($request->filled('password')) {
            $author->password = Hash::make($request->password);
        }
    
        if ($request->hasFile('photo')) {
            $existingPhotoPath = public_path('uploads/' . $author->photo);
            
            if (file_exists($existingPhotoPath)) {
                unlink($existingPhotoPath);
            }
            
            $now = time();
            $ext = $request->file('photo')->extension();
            $finalName = 'author_photo_' . $now . '.' . $ext;
            
            $request->file('photo')->move(public_path('uploads/'), $finalName);
            $author->photo = $finalName;
        }
    
        $author->name = $request->name;
        $author->email = $request->email;
        $author->update();
    
        return redirect()->route('admin_author_user_show')->with('success', 'Data Update Successfully');
    }
    public function delete($id){
        $author = Author::where('id',$id)->first();
        if ($author->photo !=null){
            unlink(public_path('uploads/' . $author->photo));
        }
        $author->delete();
        return redirect()->route('admin_author_user_show')->with('success', 'Data Delete  Successfully');


    }
    
}
