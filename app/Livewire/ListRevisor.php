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

    public function acceptItem(Item $item)
    {
        $item->setAccept(true);
        session()->flash('success', 'Annuncio accettato!');
    }

    public function rejectItem(Item $item)
    {
        $item->setAccept(false);
        session()->flash('success', 'Annuncio rifiutato!');
    }

    public function imageBadgeValidation($img)
    {   
        $combinedClasses = $img->adult . $img->spoof . $img->medical . $img->violence . $img->racy;
        if (strpos($combinedClasses, 'text-danger') !== false) {
            return   'text-danger bi bi-x-circle-fill';
        } else if (strpos($combinedClasses, 'text-warning') !== false) {
            return  'text-warning bi bi-exclamation-circle-fill';
        } else if (strpos($combinedClasses, 'text-secondary') !== false) {
            return   'text-secondary bi bi-circle';
        } else{
            return  'text-success bi bi-check-circle-fill';
        }
    }
}
