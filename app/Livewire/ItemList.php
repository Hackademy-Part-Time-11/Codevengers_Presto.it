<?php

namespace App\Livewire;

use App\Models\item;
use App\Models\category;
use Livewire\Attributes\Url;
use Livewire\Component;

class ItemList extends Component
{
    #[Url]
    public $search = '';


    public $title;
    public $Categories = [];
    public $order;


    public function render()
    {
        if (empty($this->search)) {
            $items = item::all();
        } else {
            $items = item::search($this->search);
        }
        $categories = category::all();
        return view('livewire.itemList', compact("items", "categories"));
    }
}
