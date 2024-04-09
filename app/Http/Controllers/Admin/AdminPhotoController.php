<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\File;

class AdminPhotoController extends Controller
{
    public function show(){

        $photos = Photo::get();
        return view('admin.Photo.photos', compact('photos'));
    }

    public function create()
        {
            // $categories = Category::get();
            return view('admin.Photo.photo_create');
        }

        public function store(Request $request)
{
    $request->validate([
        'caption' => 'required',
        'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
    ]);

    $now = time();
    $ext = $request->file('photo')->extension();
    $final_name = 'photo' . $now . '.' . $ext;

    $request->file('photo')->move(public_path('uploads/'), $final_name);

    $photos = new Photo();
    $photos->photo = $final_name;
    $photos->caption = $request->caption;
    $photos->save();

    return redirect()->route('admin_photo_show')->with('success', 'Updated successfully');
}

        
public function edit($id)
{
    $photo = Photo::findOrFail($id); // Fetch the photo by its ID
    return view('admin.Photo.photo_edit', compact('photo'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'caption' => 'required',
        'photo' => 'image|mimes:jpg,jpeg,png,gif'
    ]);

    $photo = Photo::findOrFail($id);

    if ($request->hasFile('photo')) {
        // If a new photo was uploaded, update the photo file
        $file = $request->file('photo');
        $now = time();
        $ext = $file->getClientOriginalExtension();
        $final_name = 'photo' . $now . '.' . $ext;
        $file->move(public_path('uploads/'), $final_name);

        // Delete the old photo file
        if ($photo->photo) {
            unlink(public_path('uploads/' . $photo->photo));
        }

        $photo->photo = $final_name;
    }

    $photo->caption = $request->caption;
    $photo->save();

    return redirect()->route('admin_photo_show')->with('success', 'Photo updated successfully');
}


// ...

public function delete($id)
{
    $photo = Photo::findOrFail($id);
    
    // Delete the photo file
    if ($photo->photo) {
        File::delete(public_path('uploads/' . $photo->photo));
    }

    $photo->delete();

    return redirect()->route('admin_photo_show')->with('success', 'Photo deleted successfully');
}


    //


}
