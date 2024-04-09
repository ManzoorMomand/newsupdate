<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class AdminSubCotegoryController extends Controller
{
    public function sub_ategory_show(){
        $sub_categories = SubCategory::with('rCategory')->orderBy('sub_category_order','asc')->get();

        return view('admin.sub_category.sub_category_show', compact('sub_categories'));
    
    }

    public function sub_category_create(){
         $sub_categories= Category::all()->sortByDesc("id");
         return view('admin.sub_category.sub_category_create', compact('sub_categories'));
             }

    public function sub_category_store(Request $request){
        $request->validate([
            'sub_category_name' => 'required',
            'sub_category_order' => 'required'
           ]);
           $sub_category = new SubCategory();
           $sub_category->sub_category_name = $request->sub_category_name;
           $sub_category->show_on_menu = $request->show_on_menu;
           $sub_category->show_on_home = $request->show_on_home;
           $sub_category->sub_category_order = $request->sub_category_order;
           $sub_category->category_id = $request->category_id;
           $sub_category->save();
           return redirect()->route('admin_sub_category_show')->with('success' ,'Data is store Successfully.');
        
    }
        public function sub_Category_edit($id){
            $categories = Category::orderBy('category_order','asc')->get();
            $sub_category = SubCategory::where('id', $id)->first();
            return view('admin.sub_category.sub_Category_edit', compact('categories','sub_category'));
        }

        public function sub_Category_update(Request $request , $id){
            $request->validate([
                'sub_category_name' => 'required',
                'sub_category_order' => 'required'
               ]);
            // $sub_categories = SubCategory::where('id', $id)->first();
            
            $sub_category =  SubCategory::where('id', $id)->first();
           $sub_category->sub_category_name = $request->sub_category_name;
           $sub_category->show_on_menu = $request->show_on_menu;
           $sub_category->show_on_home = $request->show_on_home;
           $sub_category->sub_category_order = $request->sub_category_order;
           $sub_category->category_id = $request->category_id;
           $sub_category->update();
    
        return redirect()->route('admin_sub_category_show')->with('success' ,'Data is update Successfully.');

        }
    
        public function sub_Category_delete($id){
    
            $sub_category = SubCategory::where('id', $id)->first();
                $sub_category->delete();
                return redirect()->back()->with('success' ,'Data is Delete Successfully.');
        }
}
