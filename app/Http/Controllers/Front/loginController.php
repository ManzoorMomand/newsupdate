<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Hash;
use Auth;
use App\Models\Admin; // Import the Admin model

class loginController extends Controller
{
    public function index(){

    
        return View('front.login.login');
    }
    
        public function login()
        {
            $page_data = Page::where('id', 1)->first();
            return view('front.login.login', compact('page_data'));
        }
    
        public function login_submit(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
    
            $credential = [
                'email' => $request->email,
                'password' => $request->password
            ];
    
            if (Auth::guard('author')->attempt($credential)) {
                return redirect()->route('author_home');
            } else {
                return redirect()->route('login')->with('error', 'Information is not correct!');
            }
        }
    
        public function logout()
        {
            Auth::guard('author')->logout();
            return redirect()->route('login');
        }
    
        // Other methods...
    }
   


