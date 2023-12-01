<?php

namespace App\Livewire;

use App\Models\item;
use App\Models\item_image;
use Illuminate\Support\Facades\Storage;
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
    public $itemId=null;

    public function render()
    {

        $item = new item;
        $categorie = category::all();
        $button = "crea";
        return view('livewire.item-form', compact("item", "categorie", "button"));
    }

    public function store()
    {
        $this->validate();
        
        if($this->categoryId) {

            // $this->categoryId non è null, quindi sto modificando la categoria con id = $this->categoryId

            (item::find($this->itemId))->update(['title' => $this->title,'price' => $this->price,'description' => $this->description,]);
            $this->updateImage($this->images,$this->item);
            session()->flash('success', 'Categoria modificata correttamente.');

        } else {

            // $this->categoryId è null, quindi sto creando una nuova categoria

            Category::create(['name' => $this->name]);

            session()->flash('success', 'Categoria creata correttamente.');

        }

        $this->newCategory();
        

        $this->dispatch('category-created');
    }

    private function updateImages()
    {
        foreach ($this->images as $key => $image) {
            $this->updateImageFile($key, $image);
        }
    }

    private function updateImageFile($key, $image)
    {
        $fileName = \Illuminate\Support\Str::slug($key) . '.' . $image->extension();
        $filePath = "public/images/items/{$this->item->id}/$fileName";
        $oldImgArray = $this->item->item_images->filter(function ($itemImage) use ($key) {
            $nomeFileSenzaEstensione = pathinfo($itemImage->image, PATHINFO_FILENAME);
            return $nomeFileSenzaEstensione == $key;
        });

        $oldimg = $oldImgArray->first();

        if (isset($oldimg)) {
            $percorsoPubblico = str_replace('storage', 'public', $oldimg->image);

            // Se il file esiste, sovrascrivilo
            if (Storage::exists($filePath) || Storage::exists($percorsoPubblico)) {
                Storage::delete($percorsoPubblico);
                $this->updateImageUrl($oldimg, $fileName);
                $this->saveNewImage($image, $fileName);
            }
            // Altrimenti, salva il nuovo file e crea un nuovo record in item_images
            else {
                $this->saveNewImage($image, $fileName);
                $this->createNewItemImage($fileName);
            }
        } else {
            $this->saveNewImage($image, $fileName);
            $this->createNewItemImage($fileName);
        }
    }

    private function saveNewImage($image, $fileName)
    {
        $image->storeAs("public/images/items/{$this->item->id}", $fileName);
    }

    private function createNewItemImage($fileName)
    {
        $imgNew = new item_image();
        $imgNew->image = "storage/images/items/{$this->item->id}/$fileName";
        $imgNew->item_id = $this->item->id;
        $imgNew->save();
    }

    private function updateImageUrl($itemImage, $fileName)
    {
        $url = "storage/images/items/{$this->item->id}/$fileName";
        $itemImage->update(['image' => $url]);
    }

}
