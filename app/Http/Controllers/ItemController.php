<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\item_image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\itemFormRequest;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items=item::all();
        return view("itemList",compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();

        return view('components.itemForm', [
            'title' => 'Crea una nuovo Annuncio',
            'categories' => $categories,
            'action' => route('items.store'),
            'button' => 'Crea Annuncio',
            'item' => new item(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(itemFormRequest $request)
    {
        $item = item::create($request->all());
        $item->user_id = auth()->user()->id;
        $item->save();
        $itemId = $item->id;

        $item->categories()->attach($request->categories);

        foreach ($request->file('images') as $key => $image) {

            $fileName = \Illuminate\Support\Str::slug($key) . '.' . $image->extension();

            $this->saveNewImage($image, $itemId, $fileName);
            $this->createNewItemImage($itemId, $fileName);
        }

        return redirect()->route('items.edit', $item)->with(['success' => 'Annuncio creato correttamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(item $item)
    {

        return view('components.item-annuncio', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(item $item)
    {
        $images = $item->item_images;
        $img = ["add", "add", "add", "add"];

        foreach ($images as $image) {
            $img[pathinfo($image->image, PATHINFO_FILENAME)] = $image->image;
        }
        $categories = \App\Models\Category::all();
        return view('components.itemForm', [
            'title' => 'Modifica Annuncio',
            'categories' => $categories,
            'action' => route('items.update', $item),
            'button' => 'Modifica Annuncio',
            'images' => $img,
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(itemFormRequest $request, item $item)
    {

        $item->update($request->all());

        // Aggiorna le categorie collegate
        $item->categories()->sync($request->categories);

        $this->updateImage($request, $item);

        return redirect()->route('items.edit', $item)->with(['success' => 'Annuncio aggiornato correttamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(item $item)
    {
        // $oldImages=$item->images;
        // foreach ($oldImages as $image) {
        //     if (Storage::exists($image->image)) {
        //         // Elimina l'immagine
        //         Storage::delete($image->image);
        //     }
        // }
        // Aggiorna i dati dell'item
    }
    private function updateImage(itemFormRequest $request, item $item)
    {
        // Aggiorna le immagini
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $key => $image) {
                $this->updateImageFile($key, $image, $item);
            }
        }
    }

    private function updateImageFile($key, $image, $item)
{
    $fileName = \Illuminate\Support\Str::slug($key) . '.' . $image->extension();
    $filePath = "public/images/items/{$item->id}/$fileName";
    $oldImgArray = $item->item_images->filter(function ($itemImage) use ($key) {
        $nomeFileSenzaEstensione = pathinfo($itemImage->image, PATHINFO_FILENAME);
        return $nomeFileSenzaEstensione == $key;
    });
    $oldimg = $oldImgArray->first();
    if (isset($oldimg)) {
        $percorsoPubblico = str_replace('storage', 'public', $oldimg->image);

        // Se il file esiste, sovrascrivilo
        if (Storage::exists($filePath) || Storage::exists($percorsoPubblico)) {
            Storage::delete($percorsoPubblico);
            $this->updateImageUrl($oldimg, $item->id, $fileName);
            $this->saveNewImage($image, $item->id, $fileName);
            $this->cropImage($item->id, $fileName, 300, 300); // Aggiunta della funzione di crop
        } else {
            $this->saveNewImage($image, $item->id, $fileName);
            $this->createNewItemImage($item->id, $fileName);
        }
    } else {
        $this->saveNewImage($image, $item->id, $fileName);
        $this->createNewItemImage($item->id, $fileName);
    }

}

private function cropImage($itemId, $fileName, $width, $height)
{
    $imagePath = "public/images/items/{$itemId}/{$fileName}";

    Image::load($imagePath)
        ->crop(Manipulations::CROP_CENTER, $width, $height)
        ->save($imagePath);
}

    private function saveNewImage($image, $itemId, $fileName)
    {
        $image->storeAs("public/images/items/{$itemId}", $fileName);
    }

    private function createNewItemImage($itemId, $fileName)
    {
        $imgNew = new item_image();
        $imgNew->image = "storage/images/items/{$itemId}/$fileName";
        $imgNew->item_id = $itemId;
        $imgNew->save();
    }

    private function updateImageUrl($itemImage, $itemId, $fileName)
    {
        $url = "storage/images/items/{$itemId}/$fileName";
        $itemImage->update(['image' => $url]);
    }
    public function removeImage(item_image $image){

        $percorsoPubblico = str_replace('storage', 'public', $image->image);
        if (Storage::exists($percorsoPubblico)) {
            Storage::delete($percorsoPubblico);
        }
        $image->delete();
        return redirect()->back()->with('success', 'Immagine eliminata con successo.');    }
}
