<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteHomeController extends Controller
{
    public function index()
    {
        $title = "Site Home";
        return view('site-home',compact('title'));
    }
}
