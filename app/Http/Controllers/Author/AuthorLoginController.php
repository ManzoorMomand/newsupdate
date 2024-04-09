<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Mail\Websitemail;
use Hash;
use Auth;
class AuthorLoginController extends Controller
{
    public function index()
    {
        // $pass = Hash::make('1234');
        // dd($pass);
        return View('front.login.login');
    }

    public function forget_password()
    {
        return view('author.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $author_data = Author::where('email',$request->email)->first();
        if(!$author_data) {
            return redirect()->back()->with('error','Email address not found!');
        }

        $token = hash('sha256',time());

        $author_data->token = $token;
        $author_data->update();

        $reset_link = url('author/reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br>';
        $message .= '<a href="'.$reset_link.'">Click here</a>';

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->route('author_login')->with('success','Please check your email and follow the steps there');

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

        if(Auth::guard('author')->attempt($credential)) {
            return redirect()->route('author_home');
        } else {
            return redirect()->route('author_login')->with('error', 'Information is not correct!');
        }
    }

    public function logout()
    {
        Auth::guard('author')->logout();
        return redirect()->route('author_login');
    }

    public function reset_password($token,$email)
    {
        $author_data = Author::where('token',$token)->where('email',$email)->first();
        if(!$author_data) {
            return redirect()->route('author_login');
        }

        return view('author.reset_password', compact('token','email'));

    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $author_data = Author::where('token',$request->token)->where('email',$request->email)->first();

        $author_data->password = Hash::make($request->password);
        $author_data->token = '';
        $author_data->update();

        return redirect()->route('author_login')->with('success', 'Password is reset successfully');

    }
}
