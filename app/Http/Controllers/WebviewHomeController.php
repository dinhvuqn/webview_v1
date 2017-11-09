<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebviewHomeController extends Controller
{
    public function index()
    {
        return view('front.home.index');
    }
}
