<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Online_poll;

class AdminOnlinPollController extends Controller
{

    public function show(){

        $online_poll_data = Online_poll::orderBy('id','desc')->get();
        return view('admin.online_poll.online-poll', compact('online_poll_data'));
    }

    public function create()
        {
            // $categories = Category::get();
            return view('admin.online_poll.onlin_poll_create');
        }

        public function store(Request $request)
{
    $request->validate([
        
        'question' => 'required'
    ]);

    
    $poll_data = new Online_poll();
    $poll_data->question = $request->question;
    $poll_data->yes_vote = 0;
    $poll_data->no_vote = 0;
    $poll_data->save();

    return redirect()->route('admin_online_poll_show')->with('success', 'Poll save successfully');
}

        
public function edit($id)
{
    $poll_data = Online_poll::findOrFail($id); // Fetch the photo by its ID
    return view('admin.online_poll.online_poll_edit', compact('poll_data'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'question' => 'required'
    ]);

    $poll_data = Online_poll::where('id',$id)->first();
    $poll_data->question = $request->question;
   
    $poll_data->update();

    return redirect()->route('admin_online_poll_show')->with('success', 'Poll updated successfully');
}

public function delete($id)
{
    $poll_data = Online_poll::findOrFail($id);
    
   
    $poll_data->delete();

    return redirect()->route('admin_online_poll_show')->with('success', ' deleted successfully');
}

}
