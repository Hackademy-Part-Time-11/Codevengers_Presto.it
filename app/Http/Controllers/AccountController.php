<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view ("account.index");
    }

    public function settings()
    {
        return view ("account.settings");
    }

    public function settingsStore(Request $request) 
    {
        $user = \App\Models\User::find(auth()->user()->id);

        $user->update([

            'name' => $request->name,
            'password' => $request->password,

        ]); 

        return redirect()->back()->with(['success' => 'Dati modificati correttamente!']);
    }
}
