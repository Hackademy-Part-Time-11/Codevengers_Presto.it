<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\item_image;
use Illuminate\Http\Request;
use App\Http\Requests\itemFormRequest;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();

        return view('components.itemForm', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(itemFormRequest $request)
    {
        $request->merge(['user_id' => 1]);
        $item = item::create($request->all());

        $item->save();

        $item->categories()->attach($request->categories);

        foreach ($request->file('images') as $key=>$image){
            
            $fileName = \Illuminate\Support\Str::slug($item->title). $key . '.' . $image->extension();

            $imagePath = $image->storeAs("public/images/items/$item->id", $fileName);

            $imgNew= new item_image();

            $imgNew->image = $imagePath;
            $imgNew->item_id = $item->id;
    
            $imgNew->save();
       

        }

       

        return redirect()->route('Annuncio.create')->with(['success' => 'Articolo inserito correttamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(item $item)
    {
        $categories = \App\Models\Category::all();

        return view('components.itemForm', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(itemFormRequest $request, item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(item $item)
    {
        //
    }
}
