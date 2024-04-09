<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Post;
use App\Models\Category;



class SubCategoryController extends Controller
{
    public function index($id) {
        $nav = Category::with('rSubCategory')
            ->where('show_on_menu', 'Show')
            ->orderBy('category_order', 'asc')
            ->get();
    
        $sub_category_data = SubCategory::where('id', $id)->first();
        $post_data = Post::where('sub_category_id', $id)->get();
        return view('front.sub_category', compact('sub_category_data', 'post_data', 'nav'));
    }

    
    
    
}
