<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
class AdminSettingController extends Controller
{
    public function index(){

        // $setting = setting::->get();
    
        $setting_data = Setting::where('id',1)->first();
    return view('admin.Setting.setting', compact('setting_data'));
}



public function update(Request $request){


    $request->validate([
    'news_ticker_total' => 'required',
   ]);
    
        $settings = Setting::where ('id' ,1)->first();
          
        $settings->news_ticker_total = $request->news_ticker_total;
        $settings->news_ticker_status = $request->news_ticker_status;
        $settings->video_total = $request->video_total;
        $settings->video_status = $request->video_status;

        if ($request->hasFile('logo')) {
            $request->validate([
           'logo'=>'mimes:jpeg,jpg|max:2048'
            ]);
            unlink(public_path('uploads/' . $settings->logo));
            $ext = $request->file('logo')->extension();
            $final_name = 'logo'.'.'.$ext;
            $request->file('logo')->move(public_path('uploads/'), $final_name);
            $settings->logo = $final_name;
        }
        if ($request->hasFile('favicon')) {
            $request->validate([
           'favicon'=>'mimes:jpeg,jpg|max:2048'
            ]);
            unlink(public_path('uploads/' . $settings->favicon));
            $ext = $request->file('favicon')->extension();
            $final_name = 'favicon'.'.'.$ext;
            $request->file('favicon')->move(public_path('uploads/'), $final_name);
            $settings->favicon = $final_name;
        }
        $settings->update();
        return redirect()->back()->with('success' ,'Data is Update Successfully.');


    }

}