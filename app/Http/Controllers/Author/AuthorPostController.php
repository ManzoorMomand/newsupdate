<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use Auth;
use DB;
use App\Models\Tag;

class AuthorPostController extends Controller
{
    public function post_show(){
    $posts = Post::with('rSubCategory.rCategory')->where('author_id', Auth::guard('author')
       ->user()->id)->get();
       //  $posts = Post::all();
       //  $sub_categories = SubCategory::all();

    //    $posts = Post::with('rSubCategory.rCategory')->get();

   
   return view('author.Post.post_show', compact('posts'));
}

public function post_create()
{
    $sub_categories =SubCategory::with('rCategory')->get();
    return view('author.post.post_create', compact('sub_categories'));
}
public function post_store(Request $request) {
    $request->validate([
        'post_title' => 'required',
        'post_photo' => 'image|mimes:jpg,jpeg,png,gif',
    ]);

    // $maxPostDetailLength = 65535; // Adjust this to match your database column length
    // $truncatedPostDetail = substr($request->post_detail, 0, $maxPostDetailLength);

    $q = DB::select("SHOW TABLE STATUS LIKE 'posts'");
    $ai_id = $q[0]->Auto_increment;

    $now = time();
    $ext = $request->file('post_photo')->extension();
    $final_name = 'post_photo' . $now . '.' . $ext;
    $request->file('post_photo')->move(public_path('uploads/'), $final_name);

    $post_detail = $request->post_detail;
    $image_url = asset('uploads/' . $final_name); // Generate URL for the uploaded image
    $post_detail_with_image = $post_detail . '<br><img src="' . $image_url . '">'; 

    $post = new Post();
    $post->sub_category_id = $request->sub_category_id;
    $post->post_title = $request->post_title;
    $post->post_detail = $post_detail_with_image;
    $post->post_photo = $final_name;
    $post->visitors = 1;
    $post->author_id = Auth::guard('author')->user()->id;
    $post->admin_id =0;
    $post->is_share = $request->is_share;
    $post->is_comment = $request->is_comment;
    $post->save();

    
        // Process and save tags associated with the post
         $tags_array_new = [];
        $tags_array = explode(',', $request->tags);
        for ($i = 0; $i<count($tags_array); $i++)
        {
            $tags_array_new[] = trim($tags_array[$i]);
        }
        $tags_array_new = array_values(array_unique($tags_array_new));
        for ($i = 0; $i<count($tags_array_new); $i++)
        
        {
            $tag = new Tag();
            $tag->post_id = $ai_id;
            $tag->tag_name = trim($tags_array_new[$i]);
            $tag->save();
        }

    // Redirect with a success message
    return redirect()->route('author_post_show')->with('success', 'Data saved successfully');
}


 
public function  post_edit($id){

    // $test = Post::where('id',$id)->where('author_id',Auth::guard('author')->user()->id)->count();
    // if(!$test) {
    //     return redirect()->route('author_home');
    // }
    $sub_categories =SubCategory::with('rCategory')->get();
    $existing_tags =Tag::where('post_id',$id)->get();
    $posts_EDIT = Post::where('id', $id)->first();
    return view('author.Post.post_edit', compact('posts_EDIT', 'sub_categories', 'existing_tags'));
}


public function post_update(Request $request, $id) {
    $request->validate([
        'post_title' => 'required',
        'post_detail' => 'required',
        'post_detail' => 'required|max:65535', // or another appropriate maximum length

    ]);

    $maxPostDetailLength = 255;
    $truncatedPostDetail = substr($request->post_detail, 0, $maxPostDetailLength);

    $post = Post::find($id); // Use find() to retrieve the post by ID
    
    if ($request->hasFile('post_photo')) {
        $request->validate([
            'post_photo' => 'image|mimes:jpg,jpeg,png,gif',
        ]);

        if ($post->post_photo !== null) {
            unlink(public_path('uploads/' . $post->post_photo));
        }

        $now = time();
        $ext = $request->file('post_photo')->extension();
        $final_name = 'post_photo' . $now . '.' . $ext;

        $request->file('post_photo')->move(public_path('uploads/'), $final_name);

        $post->post_photo = $final_name;
    }

    $post->sub_category_id = $request->sub_category_id;
    $post->post_title = $request->post_title;
    //  $post->post_detail = $truncatedPostDetail;
    $post->post_detail= $request->post_detail;
    $post->is_share = $request->is_share;
    $post->is_comment = $request->is_comment;
    $post->update();

    if ($request->tags != '') {
        $tags_array = explode(',', $request->tags);
        $tags_array = array_map('trim', $tags_array);

        foreach ($tags_array as $tag_name) {
            $total = Tag::where('post_id', $id)->where('tag_name', $tag_name)->count();

            if (!$total) {
                $tag = new Tag();
                $tag->post_id = $id;
                $tag->tag_name = $tag_name;
                $tag->save();
            }
        }
    }

    return redirect()->route('author_post_show')->with('success' ,'Data is Update Successfully.');    }

public function delete_tag($id,$id1){
   
   $tag = Tag::where('id',$id)->first();
   $tag->delete();
     // dd($id1);
    return redirect()->route('author_post_edit',$id1)->with('success', 'Tag Delete Successfully ');

}

public function post_delete($id){
    $tag = DB::table("tags")->where('post_id','=',$id);
   $post = Post::where('id',$id)->first();
   unlink(public_path('uploads/'.$post->post_photo));
   $post->delete();
//    $tag = Tag::where('post_id',$id)->first();

     // dd($id1);
    return redirect()->route('author_post_show')->with('success', 'post Delete Successfully ');

}

}