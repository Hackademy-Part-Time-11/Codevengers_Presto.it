<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index(Item $item) {
        
        return view('revisor.index', compact('item'));
    }

    public function acceptItem(Item $item) {

        $item->setAccept(true);
        return redirect()->route('listRevisor')->with('success', 'Annuncio accettato!');
    }

    public function rejectItem(Item $item) {

        $item->setAccept(false);
        return redirect()->route('listRevisor')->with('success', 'Annuncio rifiutato!');
    }
}
