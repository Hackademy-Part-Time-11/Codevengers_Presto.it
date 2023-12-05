<div>
    @vite(['resources/css/itemForm.scss'])

    <h1 class="mb-4"> {{ $item->id ? 'Modifica' : 'Crea' }}</h1>

    <x-success />

    <form wire:submit="store" class="mb-4">
        @csrf

        <div class="row g-3">
            <div class="col-12">
                <label for="title">Nome prodotto</label>
                <input type="text" name="title" id="title" maxlength="150" class="form-control @error('title') is-invalid @enderror" wire:model.blur="title">
                @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
                <label>Categorie associate</label>
                <div class="row">
                    @foreach($categorie as $key =>$category)
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="categories[]" id="flexCheckDefault{{$key}}" value="{{ $category->id }}" wire:model.blur='categories'>
                            <label class="form-check-label" for="flexCheckDefault{{$key}}">
                                {{ $category->name }}
                            </label>
                        </div>
                    </div>

                    @endforeach
                </div>
                @error('categories') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <div class="col-12 ">
                <label for="price">Prezzo</label>
                <input type="number" name="price" id="price" min="1" class="form-control @error('price') is-invalid @enderror" wire:model.blur='price'>
                @error('price') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <div class="col-12 align-items-center">
                <label for="image">Immagini prodotto (max:4)</label>

                @if($item->id)
                <div class="row align-items-end">
                    @foreach($images as $key=>$image)
                    <div class="col-3">
                        <div class="image-container" data-image-index="{{ $key }}">
                            @if ($image != "add")
                            <img src="{{ $image ? asset($image) : '#' }}" alt="Immagine esistente" class="existing-image">
                            <input type="file" name="new_images[]" class="new-image-input dn" wire:model.blur="imagesNew">
                            @else
                            <div class="add-image-placeholder">
                                <i class="bi bi-folder-plus existing-image"></i>
                                <input type="file" name="new_images[]" class="new-image-input dn" wire:model.blur="imagesNew">
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

                @endif


                <input type="file" name="images[]" id="images" accept="image/*" class="form-control {{$item->id ?'dn': ''}}" wire:model.blur="temporary_images" multiple>



                @if(!empty($images))
                <div class="row border border-4 border-info rounded shadow py-4">
                    @foreach($images as $image)
                    <div class="col my-3">
                    <!-- <div class="mx-auto shadow rounded" style="width:400px;height:400px;background-image: url({{$image->temporaryUrl()}});"></div> -->
<img class="aaaaaaa" width="300px" src="{{$image->temporaryUrl()}}" alt="">
                    </div>
                    @endforeach
                </div>
                @endif

                
                @error('images') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-12">
            <label for="description">Descrizione</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="10" maxlength="5000" wire:model.blur='description'>{{ old('description',$item->description) }}</textarea>
            @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">{{ $item->id ? 'Modifica' : 'Crea' }}</button>
        </div>
</div>
</form>

</div>