<?php

namespace App\Livewire;

use App\Models\item;
use App\Models\category;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Component;

use Livewire\WithFileUploads;

class ItemForm extends Component
{

    use WithFileUploads;

    #[Validate('required|max:40')]
    public $title = "";
    #[Validate('required|numeric|min:1')]
    public $price = "";
    #[Validate('required|max:5000')]
    public $description = "";
    #[Validate(['images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 'images' => 'max:4'])]
    public $images = [];

    public $categories = [];

    public function render()
    {

        $item = new item;
        $categorie = category::all();
        $button = "crea";
        return view('livewire.item-form', compact("item", "categorie", "button"));
    }

    public function updatedImages()
    {
        $this->emit('updateImagePreview');
    }
}
