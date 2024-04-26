<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetailerWarranty extends Controller
{
    public function GetRetailerCustomer()
    {
        return view('pages.all-warranty-customer');
    }
}
