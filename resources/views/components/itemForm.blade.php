<x-layout-main>
    <div id="itemForm">


        @vite(['resources/css/itemForm.scss','resources/js/formItem.js'])

        <h1 class="mb-4" style="color:rgb(204, 150, 255);" >{{$title}}</h1>

        <x-success />

        <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="mb-4 mx-5" >
            @csrf
            @if($item->id)
            @method('PUT')
            @endif
            <div class="row g-3">
                <div class="col-12">
                    <label for="title">Nome prodotto</label>
                    <input type="text" name="title" id="title" maxlength="150" class="form-control @error('title') is-invalid @enderror" value="{{ old('title',$item->title) }}">
                    @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="col-12">
                    <label>Categorie associate</label>
                    <div class="row">
                        @foreach($categories as $key =>$category)
                        <div class="col-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="categories[]" id="flexCheckDefault{{$key}}" value="{{ $category->id }}" @checked($item->categories->contains($category->id))>
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
                    <input type="number" name="price" id="price" min="1" class="form-control @error('price') is-invalid @enderror" value="{{ old('price',$item->price) }}">
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
                                <input type="file" name="new_images[]" class="new-image-input dn">
                                <img src="#" alt="Anteprima" class="new-image-preview  existing-image dn">

                                @else
                                <div class="add-image-placeholder">
                                    <i class="bi bi-folder-plus existing-image"></i>
                                    <input type="file" name="new_images[]" class="new-image-input dn">
                                    <img src="#" alt="Anteprima" class="new-image-preview existing-image dn">
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @endif


                    <input type="file" name="images[]" id="images" accept="image/*" class="form-control {{$item->id ?'dn': ''}}" multiple>

                    <div id="imagePreview">
                    </div>
                    @error('images') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>

                <div class="col-12">
                    <label for="description">Descrizione</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="10" maxlength="5000">{{ old('description',$item->description) }}</textarea>
                    @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-4" style="background-color: rgb(79, 16, 69); border:0;  ">{{$button}}</button>
                </div>
            </div>
        </form>
    </div>
</x-layout-main>