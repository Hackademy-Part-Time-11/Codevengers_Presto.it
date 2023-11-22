<x-layout-main>
<h1 class="mb-4">Crea un nuovo articolo</h1>

{{--
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        {{ $error }}<br>
        @endforeach
    </div>
@endif
--}}

<x-success />

<form action="{{ route('Annuncio.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
    @csrf
    <div class="row g-3">
        <div class="col-12">
            <label for="title">Title</label>
            <input
                type="text"
                name="title"
                id="title"
                maxlength="150"
                class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title') }}"
            >
            @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="col-12">
            <label>Categoria</label>
            @foreach($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}">
                    <label class="form-check-label" for="flexCheckDefault">
                    {{ $category->name }}
                    </label>
                </div>
            @endforeach

            @error('categories') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="col-12">
            <label for="description">Descrizione breve</label>
            <textarea name="description" id="description"
                class="form-control @error('description') is-invalid @enderror"
                maxlength="250">{{ old('description') }}</textarea>
            @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="col-12">
            <label for="image">Immagine</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="col-12">
            <label for="body">Corpo dell'articolo</label>
            <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror"
                rows="10"  maxlength="5000">{{ old('body') }}</textarea>
            @error('body') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Crea Articolo</button>
        </div>
    </div>
</form>


</x-layout-main>