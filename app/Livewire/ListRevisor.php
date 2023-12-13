<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ListRevisor extends Component
{

    public $itemId;

    public function render()
    {
        $items = Item::where('is_accepted', null)->get();

        return view('livewire.list-revisor', ['items' => $items]);
    }

    public function acceptItem() {
        dd($this->itemId);
        $item=item::findOrFail($this->itemId);
        $item->setAccept(true);
        return redirect()->back()->with('message', 'Annuncio accettato!');

    }

    public function rejectItem() {
        $item=item::findOrFail($this->itemId);
        $item->setAccept(false);
        return redirect()->back()->with('message', 'Annuncio rifiutato!');
    }
}
