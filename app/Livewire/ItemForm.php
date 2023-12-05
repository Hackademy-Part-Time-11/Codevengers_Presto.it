<?php

namespace App\Livewire;

use App\Models\item;
use App\Models\item_image;
use Illuminate\Support\Facades\Storage;
use App\Models\category;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemForm extends Component
{

    use WithFileUploads;

    #[Validate('required', message: 'Il campo "Nome prodotto" non può essere vuoto.')]
    #[Validate('max:40', message: 'Il campo Titolo non può essere più lungo di :max caratteri')]
    public $title;

    #[Validate('required', message: 'Il campo "Prezzo" è obbligatorio.')]
    #[Validate('numeric', message: 'Il "Prezzo" deve essere un numero.')]
    #[Validate('min:1', message: 'Il "Prezzo" deve essere almeno 1.')]
    public $price;

    #[Validate('required', message: 'Il campo "Descrizione" non può essere vuoto.')]
    #[Validate('max:5000', message: 'Il campo "Descrizione" non può essere più lungo di :max caratteri')]
    public $description;

    #[Validate('max:4', message: 'Non puoi inserire più di quattro immagini.')]
    public $images = [];
    public $temporary_images;

    public $categories = [];
    public $item;

    public $showInput = false;

    public function toggleInput()
    {
        $this->showInput = !$this->showInput;
    }

    public function render()
    {

        $this->item = item::find("49");
        if ($this->item->id) {
            $img = ["add", "add", "add", "add"];

            foreach ($this->item->item_images as $image) {
                $img[pathinfo($image->image, PATHINFO_FILENAME)] = $image->image;
            }
            $this->images = $img;
        } else {
        }
        $categorie = category::all();
        return view('livewire.item-form', compact("categorie"));
    }

    public function store()
    {

        $this->validate();
        if ($this->item->id) {

            // $this->categoryId non è null, quindi sto modificando la categoria con id = $this->categoryId

            (item::find($this->item->id))->update(['title' => $this->title, 'price' => $this->price, 'description' => $this->description,]);
            $this->updateImage($this->images, $this->item);
            session()->flash('success', 'Categoria modificata correttamente.');
        } else {

            // $this->categoryId è null, quindi sto creando una nuova categoria

            $item = Item::create([
                'title' => $this->title,
                'price' => $this->price,
                'description' => $this->description,
                'user_id' => auth()->user()->id,
            ]);
            $this->item = $item;
            $item->categories()->attach($this->categories);

            $this->updateImages();

            session()->flash('success', 'Categoria creata correttamente.');
        }
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
