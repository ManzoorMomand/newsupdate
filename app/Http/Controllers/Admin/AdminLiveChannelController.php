<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Live_Channel;
class AdminLiveChannelController extends Controller
{
    public function show(){

        $live_channel = Live_Channel::get();
        return view('admin.livechannel.live_show', compact('live_channel'));
    }

    public function create()
        {
            // $categories = Category::get();
            return view('admin.livechannel.live_create');
        }

        public function store(Request $request)
{
    $request->validate([
        'heading' => 'required',
        'video_id' => 'required'
    ]);

    
    $video = new Live_Channel();
    $video->video_id = $request->video_id;
    $video->heading = $request->heading;
    $video->save();

    return redirect()->route('admin_live_show')->with('success', 'live save successfully');
}

        
public function edit($id)
{
    $video_edit = Live_Channel::findOrFail($id); // Fetch the photo by its ID
    return view('admin.livechannel.live_edit', compact('video_edit'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'heading' => 'required',
        'video_id' => 'required'
    ]);

    $video_data = Live_Channel::where('id',$id)->first();
    $video_data->video_id = $request->video_id;
    $video_data->heading = $request->heading;
    $video_data->save();

    return redirect()->route('admin_live_show')->with('success', 'live updated successfully');
}

public function delete($id)
{
    $video_delete = Live_Channel::findOrFail($id);
    
   
    $video_delete->delete();

    return redirect()->route('admin_video_show')->with('success', 'delete deleted successfully');
}

}
