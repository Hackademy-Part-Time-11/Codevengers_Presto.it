<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class PageController extends Controller
{
    public function home()
    {
        $categories = Category::all();

        return view('home', compact('categories'));
    }
    
    public function setLanguage($lang){
        
        session()->put('locale', $lang);
        return redirect()->back();
    }

}