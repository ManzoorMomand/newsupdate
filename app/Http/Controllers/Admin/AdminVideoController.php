<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class AdminVideoController extends Controller
{
    public function show(){

        $videos = Video::get();
        return view('admin.videos.videos_show', compact('videos'));
    }

    public function create()
        {
            // $categories = Category::get();
            return view('admin.videos.video_create');
        }

        public function store(Request $request)
{
    $request->validate([
        'caption' => 'required',
        'video_id' => 'required'
    ]);

    
    $video = new Video();
    $video->video_id = $request->video_id;
    $video->caption = $request->caption;
    $video->save();

    return redirect()->route('admin_video_show')->with('success', 'video save successfully');
}

        
public function edit($id)
{
    $video_edit = Video::findOrFail($id); // Fetch the photo by its ID
    return view('admin.videos.video_edit', compact('video_edit'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'caption' => 'required',
        'video_id' => 'required'
    ]);

    $video_data = Video::where('id',$id)->first();
    $video_data->video_id = $request->video_id;
    $video_data->caption = $request->caption;
    $video_data->save();

    return redirect()->route('admin_video_show')->with('success', 'video updated successfully');
}

public function delete($id)
{
    $video_delete = Video::findOrFail($id);
    
   
    $video_delete->delete();

    return redirect()->route('admin_video_show')->with('success', 'delete deleted successfully');
}


    //



}
