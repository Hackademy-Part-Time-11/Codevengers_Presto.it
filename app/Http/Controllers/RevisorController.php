<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index() {

        $item_to_check = Item::where('is_accepted', null)->first();
        return view('revisor.index', compact('item_to_check'));
    }

    public function acceptItem(Item $item) {

        $item->setAccept(true);
        return redirect()->back()->with('message', 'Annuncio accettato!');

    }

    public function rejectItem(Item $item) {

        $item->setAccept(false);
        return redirect()->back()->with('message', 'Annuncio rifiutato!');
    }
}
