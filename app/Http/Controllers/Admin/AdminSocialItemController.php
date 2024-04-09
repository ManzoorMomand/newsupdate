<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social_Item;

class AdminSocialItemController extends Controller
{
 
    public function Show(){
        $social_item_data = Social_Item::get();
        return view('admin.Social_media.social_item_show', compact('social_item_data'));
    }

    public function create()
    {
        // $categories = Category::get();
        return view('admin.Social_media.social_create');
    }

    public function store(Request $request){
       $request->validate([
        'icon' => 'required',
        'url' => 'required'
       ]);
       $social_item_data = new Social_Item();
       $social_item_data->icon = $request->icon;
       $social_item_data->url = $request->url;
       $social_item_data->save();
       return redirect()->back()->with('success', 'Data save successfully ');
    }

    public function  edit($id){
        $social_item_data = Social_Item::where('id', $id)->first();
        return view('admin.Social_media.social_edit', compact('social_item_data'));
    }
    public function update(Request $request , $id){
        $social_item_data = Social_Item::where('id', $id)->first();

        $social_item_data->icon = $request->icon;
        $social_item_data->url = $request->url;
        $social_item_data->update();

        return redirect()->back()->with('success' ,'Data is Update Successfully.');
    }

    public function delete($id){

        $social_item_data = Social_Item::where('id', $id)->first();
            $social_item_data->delete();
            return redirect()->back()->with('success' ,'Data is delete Successfully.');
    }
}

