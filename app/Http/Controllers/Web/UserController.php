<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\SessionGuard;
class UserController extends Controller
{

    public function index()
    {
        return view('web.users.index');
    }

    public function userSimulate(Request $request)
    {
        Auth::guard('customer')->logout();

        $user = Customer::where('id', $request->id);
        if(isset($user)){
            Auth::guard('customer')->loginUsingId($request->id);
            $request->session()->regenerate();
            //user is logged in.
        }
        return redirect()->route('profile')->with('Login!');
    }
}
