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
}
