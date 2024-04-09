<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Video;
use App\Models\Photo;
use App\Models\Online_poll;

class AdminHomeController extends Controller
{
    public function index()
    {
         $posts = Post::count();
         $categories= Category::count();
         $sub_categorys  = SubCategory::count();
         $videos = Video::count();
         $photos = Photo::count();
         $online_poll = Online_poll::count();
         


        // $setting_data = Setting::where('id',1)->first();
        return view('admin.home', compact('posts','categories','sub_categorys','videos','photos','online_poll'));
    }
}
