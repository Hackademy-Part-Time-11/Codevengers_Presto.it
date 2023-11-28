<div>
    @vite('resources/css/itemList.scss')

    <div class="row" id="item-list">
        <div class="col-12">
            <h1>Titolo <a href="{{ route('items.create') }}"><i class="bi bi-plus-square"></i></a></h1>
        </div>
        <div class="col-2">
            <h2>filtra la tua ricerca</h2>
            <h3>ordine:</h3>
            <div class="form-check d-flex flex-column">

                <label class="form-check-label" for="flexRadioDefault1">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">Alfabetico
                </label>
                <label class="form-check-label" for="flexRadio2">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadio2">
                    Prezzo
                </label>
                <label class="form-check-label" for="flexRadio3">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadio3">
                    Data creazione
                </label>
            </div>
            <h3>Filtra per:</h3>
            <h6>categoria</h6>
            @foreach($categories as $key =>$category)
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="categories[]" id="flexCheckDefault{{$key}}" value="{{ $category->id }}">
                    <label class="form-check-label" for="flexCheckDefault{{$key}}">
                        {{ $category->name }}
                    </label>
                </div>
            </div>

            @endforeach
        </div>
        <div class="col-8">
            <div class="row mb-5">
                <div class="col-12">

                    <input type="text" wire:model.live="search">
                    <i class="bi bi-search"></i>

                </div>
                {{$search}}
            </div>
            <div class="row g-3">
                @foreach($items as $item)
                <div class="col-12" wire:key="{{ $item->id }}">
                    <x-itemCard :$item />
                </div>
                @endforeach
            </div>


        </div>