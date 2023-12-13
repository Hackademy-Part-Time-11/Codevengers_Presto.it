<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ListRevisor extends Component
{


    public function render()
    {
        $items = Item::where('is_accepted', null)->get();

        return view('livewire.list-revisor', ['items' => $items]);
    }
    
    public function acceptItem( Item $item) {
        $item->setAccept(true);
        session()->flash('success', 'Annuncio accettato!');

    }

    public function rejectItem( Item $item) {
        $item->setAccept(false);
        session()->flash('success', 'Annuncio rifiutato!');
    }
}
