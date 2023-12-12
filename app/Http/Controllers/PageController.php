<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;

class PageController extends Controller
{
    public function home()
    {
        $items =  Item::latest('created_at')->take(12)->get()->chunk(4);

        return view('home', compact('items'));
    }
    
    public function setLanguage($lang){
        
        session()->put('locale', $lang);
        return redirect()->back();
    }

}