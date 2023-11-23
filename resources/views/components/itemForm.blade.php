<x-layout-main>

    @vite('resources/js/formItem.js')

    <h1 class="mb-4">{{$title}}</h1>

    <x-success />

    <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="mb-4">
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
                            <input class="form-check-input" type="checkbox" name="categories[]" id="flexCheckDefault{{$key}}" value="{{ $category->id }}">
                            <label class="form-check-label" for="flexCheckDefault{{$key}}">
                                {{ $category->name }}
                            </label>
                        </div>
                    </div>

                    @endforeach
                </div>
                @error('categories') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
                <label for="price">Prezzo</label>
                <input type="number" name="price" id="price" min="1" class="form-control @error('price') is-invalid @enderror" value="{{ old('price',$item->price) }}">
                @error('price') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
                <label for="image">Immagini prodotto (max:4)</label>
                <input type="file" name="images[]" id="images" accept="image/*" class="form-control" multiple>
                <div id="imagePreview">
                    @if($item->id)



                    @endif
                </div>
                @error('images') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
                <label for="description">Descrizione</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="10" maxlength="5000">{{ old('description',$item->description) }}</textarea>
                @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">{{$button}}</button>
            </div>
        </div>
    </form>


</x-layout-main>