<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\page;

class PageController extends Controller
{
    public function about(){
        $page_data = page::where('id', 1)->first();
        return view('front.about',compact('page_data'));
    }

    public function contact(){

        // $contact = page::where('id', 1)->first();
        return view('front.contact');
    }

  
}
