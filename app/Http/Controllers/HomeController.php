<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $ip_address = $request->ip();
        return view('geoip', ['ip_address' => $ip_address]);
    }
}
