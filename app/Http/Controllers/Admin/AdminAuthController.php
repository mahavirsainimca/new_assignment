<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class AdminAuthController extends Controller
{
    public function getLogin()
    {
        if (Auth::check())
        {
            return redirect('admin/dashboard');
        }

        return view('auth/login');
    }
}
