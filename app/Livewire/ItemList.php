<?php

namespace App\Livewire;
use App\Models\item;
use Livewire\Component;

class ItemList extends Component
{
    public $title;
    public $Categories=[];
    public $order;


    public function render()
    {
        $items=item::all();
        return view('livewire.item-list', compact("items"));
    }
}
