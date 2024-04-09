<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Admin;
use App\Models\Tag;
use App\Models\Author;

class PostController extends Controller
{
    // public function detail($id){
    //     $tage_data =Tag::where('post_id',$id)->get();

    //     $post_detail = Post::with('rSubCategory')->where('id',$id)->first();

    //     // if ($post_detail->author_id == 0)
    //     // {
    //        $user_data = Admin::where('id',$post_detail->admin_id)->first();
    //     //     // dd($user_data->name);
    //     // }
    //     // else
    //     // {
    //     //     //implent later 
    //     // }
    //     $new_value =$post_detail->visitors+1;
    //     $post_detail->visitors = $new_value;
    //     $post_detail->update();
    //     $related_post_array = Post::with('rSubCategory')->orderBy('id','desc')->where('sub_category_id',$post_detail->sub_category_id)->get();
    //     return view('front.PostDetail.post_detail', compact('post_detail','user_data','tage_data','related_post_array'));
    // }

    public function detail($id){
        $tag_data = Tag::where('post_id', $id)->get();
    
        $post_detail = Post::with('rSubCategory')->where('id', $id)->first();
    
        $user_data = null; // Initialize user_data to avoid potential errors
    
        if ($post_detail->author_id == 0) {
            $user_data = Admin::where('id', $post_detail->admin_id)->first();
        } else {
            $user_data = Author::where('id', $post_detail->author_id)->first();
        }
    
        $new_value = $post_detail->visitors + 1;
        $post_detail->visitors = $new_value;
        $post_detail->update();
    
        $related_post_array = Post::with('rSubCategory')
            ->orderBy('id', 'desc')
            ->where('sub_category_id', $post_detail->sub_category_id)
            ->get();
    
        return view('front.PostDetail.post_detail', compact('post_detail', 'user_data', 'tag_data', 'related_post_array'));
    }
    

    
}
