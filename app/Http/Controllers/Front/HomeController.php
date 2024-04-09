<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Models\Setting;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;
use App\Models\Video;
use App\Models\Category;
use App\Models\page;
use App\Models\Online_Poll;
use App\Models\Tag;
class HomeController extends Controller
{
    public function index(){
        $video_data = Video::get();
        $home_ad_data = HomeAdvertisement::where('id',1)->first();
        $setting_data = Setting::where('id',1)->first();
        $post_data = Post::orderBy('id','desc')->orderBy('id','desc')->paginate(4);
       
        $sub_category_data = SubCategory::with('rPost')->orderBy('sub_category_order','asc')->where('show_on_home','Show')->get();
        // $post = DB::table('posts')->paginate(10);
        // $categoryies = Category::with('rSubCategory')->where ('show_on_menu','Show')->orderBy('category_order','asc')->get();

        $category_data = Category::orderBy('category_order' , 'asc')->get();
        
        return view('home', compact('home_ad_data','setting_data','post_data','sub_category_data','video_data','category_data'));
    }

    public function get_subcategory_by_category($id)
    {
        $sub_category_data = SubCategory::where('category_id', $id)->get();
        $response = "<option value=''>Select SubCategory</option>";
        foreach ($sub_category_data as $item) {
            $response .= '<option value="' . $item->id . '">' . $item->sub_category_name . '</option>';
        }
    
        return response()->json(['sub_category_data' => $response]);
    }
    
    

    public function photo(){
        $photos = Photo::get();
        $photos = DB::table('photos')->paginate(8);
        return view('front.photo.photo_show', compact('photos', 'photos'));
    }

    public function video(){
        $videos = Video::paginate();
        return view('front.video.video-page', compact('videos')); // Pass the $videos variable to the view
    }
    

    public function poll(Request $request)
        {
       $poll_data =Online_Poll::where('id', $request->id)->first();
        if ($request->vote == 'Yes')
        {
            $updated_yes = $poll_data->yes_vote+1;
            $poll_data->yes_vote = $updated_yes;
        }
        else
        {
        $updated_no = $poll_data->no_vote+1;
            $poll_data->no_vote = $updated_no;

    }
    $poll_data->update();
    session()->put('current_poll_id',$poll_data->id);
    return redirect()->back()->with('success','Vote counted successfully');
}

public function poll_result(){
    $poll_data = Online_Poll::orderBy('id', 'desc')->get();
    return view('front.poll.poll_previews', compact('poll_data')); // Corrected variable name
}

public function Tag($tag_name){
    $all_data = Tag::where('tag_name', $tag_name)->get();
    $all_post_ids = [];
    foreach ( $all_data as  $row){
        $all_post_ids[] = $row->post_id;
        }
    $all_data = Post::with('rSubCategory')->orderBy('id','desc')->paginate(12);
    return view ('front.tag.tag', compact('all_post_ids','all_data','tag_name'));

}
public function search(Request $request){

    $post_data =Post::with('rSubCategory')->orderBy('id', 'desc');
    if ($request->text_item!=''){
        $post_data = $post_data->where('post_title', 'like', '%'.$request->text_item. '%');
    }
    if ($request->category_item!=''){
        $post_data = $post_data->where('sub_category_id', $request->sub_category);
    }
    $post_data = $post_data->paginate(5);
    return view ('front.search_result', compact('post_data'));
    }
    }
  



