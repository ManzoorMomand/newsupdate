<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;

class AdminPageController extends Controller
{
    public function about_show(){

        $page =  page::where('id', 1)->first(); 
        return view('admin.sub.page_about',compact('page'));
    }


    public function edit($id) {
        $page = page::where('id', $id)->first();
        return view('admin.sub.page_about', compact('page')); // Use $page_edit instead of $page_about
    }
    
    
    
    public function update(Request $request, $id) {
        $page = page::where('id', $id)->first();
    
        $page->about_title = $request->about_title;
        $page->about_detail = $request->about_detail;
        $page->about_status = $request->about_status;
    
        // Save the changes
        $page->save();
    
        return redirect()->back()->with('success', 'Data is updated successfully.');
    }
    

    public function Category_delete($id){

        $categories = Category::where('id', $id)->first();
            $categories->delete();
            return redirect()->back()->with('success' ,'Data is Delete Successfully.');
    }

    public function faq_show(){

        $page_faq =  page::where('id', 1)->first(); 
        return view('admin.sub.faq_show',compact('page_faq'));
    }
  
    
    
    public function faq_update(Request $request, $id) {
        $pages_faq = page::where('id', $id)->first();
    
        $pages_faq->faq_title = $request->faq_title;
        $pages_faq->faq_detail = $request->faq_detail;
        $pages_faq->faq_status = $request->faq_status;
        $pages_faq->update();
    
        return redirect()->back()->with('success', 'Data is updated successfully.');
    }

    public function term_show(){

        $page_terms =  page::where('id', 1)->first(); 
        return view('admin.sub.term_condition',compact('page_terms'));
    }
    
    public function term_update(Request $request, $id) {
        $pages_terms = page::where('id', $id)->first();
    
        $pages_terms->terms_title = $request->terms_title;
        $pages_terms->terms_detail = $request->terms_detail;
        $pages_terms->terms_status = $request->terms_status;
        $pages_terms->update();
    
        return redirect()->back()->with('success', 'Data is updated successfully.');
    }



    public function policy_show(){

        $pages_policy =  page::where('id', 1)->first(); 
        return view('admin.sub.privacy',compact('pages_policy'));
    }
    
    public function policy_update(Request $request, $id) {
        $pages_policy = page::where('id', $id)->first();
    
        $pages_policy->privacy_title = $request->privacy_title;
        $pages_policy->privacy_detail = $request->privacy_detail;
        $pages_policy->privacy_status = $request->privacy_status;
        $pages_policy->update();
    
        return redirect()->back()->with('success', 'Data is updated successfully.');
    }

    public function disclaimer_show(){

        $disclaimer_policy =  page::where('id', 1)->first(); 
        return view('admin.sub.Disclaimer',compact('disclaimer_policy'));
    }
    
    public function disclaimer_update(Request $request, $id) {
        $disclaimer_policy = page::where('id', $id)->first();
    
        $disclaimer_policy->disclaimer_title = $request->disclaimer_title;
        $disclaimer_policy->disclaimer_detail = $request->disclaimer_detail;
        $disclaimer_policy->disclaimer_status = $request->disclaimer_status;
        $disclaimer_policy->update();
    
        return redirect()->back()->with('success', 'Data is updated successfully.');
    }


    public function login_show(){

        $login_policy =  page::where('id', 1)->first(); 
        return view('admin.sub.login',compact('login_policy'));
    }
    
    public function login_update(Request $request, $id) {
        $login_policy = page::where('id', $id)->first();
    
        $login_policy->login_title = $request->login_title;

        $login_policy->login_status = $request->login_status;
        $login_policy->update();
    
        return redirect()->back()->with('success', 'Data is updated successfully.');
    }

    public function contact_show(){

        $contact_page =  page::where('id', 1)->first(); 
        return view('admin.sub.contact',compact('contact_page'));
    }
    
    public function contact_update(Request $request, $id) {
        $contact_page = page::where('id', $id)->first();
    
        $contact_page->contact_title = $request->contact_title;
        $contact_page->contact_detail = $request->contact_detail;
        $contact_page->contact_map = $request->contact_map;
        $contact_page->contact_status = $request->contact_status;
        $contact_page->update();
    
        return redirect()->back()->with('success', 'Data is updated successfully.');
    }
}


