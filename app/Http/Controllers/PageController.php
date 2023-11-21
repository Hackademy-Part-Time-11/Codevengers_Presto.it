<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $title = 'Welcome!';
        return view ('home', compact('title'));
    }
    public function contacts()
    {
        return view ('contacts');
    }

}