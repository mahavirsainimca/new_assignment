<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function login()
    {
        if (Auth::guard('customer')->user()) {
            return redirect()->route('profile')->with('Already Login!');
        }
        return view('web.login');
    }

    public function authenticate(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ],
        [
            'password.min' => 'Password length is min 6!'
        ]);

        if(\Auth::guard('customer')->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            $message = 'Login Successfully!';
            return redirect()->route('profile')->with('success', $message);
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        return redirect('/')->with('success', "Logout Successfully!");
    }


}
