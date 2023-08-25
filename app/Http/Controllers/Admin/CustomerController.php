<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Customer;
use Session;

class CustomerController extends Controller
{
    public function index()
    {
        $ItemData = Customer::orderBy('id', 'DESC')->get();
        // dd($ItemData);
        return view('admin.customer.index')->with("result",$ItemData);
    }
}
