<div>
    @vite('resources/css/itemList.scss')
    <div class="container-fluid">


        <div class="row" id="item-list">
            <div class="col-2">

            </div>
            <div class="col-10">
                <h1>Annunci</h1>
            </div>
            <div class="col-2 ">
                <div class="filter">
                    <h2>filtra la tua ricerca</h2>
                    <h3>ordine:</h3>
                    <div class="form-check d-flex flex-column">


                        <label class="form-check-label" for="flexRadioDefault1">
                            <input class="form-check-input" type="radio" value="A-z" wire:model.live="order">
                            A-z
                        </label>
                        <label class="form-check-label" for="flexRadio2">
                            <input class="form-check-input" type="radio" value="Z-a" wire:model.live="order">
                            Z-a
                        </label>
                        <label class="form-check-label" for="flexRadio3">
                            <input class="form-check-input" type="radio" value="T" wire:model.live="order">
                            Più recente
                        </label>
                        <label class="form-check-label" for="flexRadioDefault1">
                            <input class="form-check-input" type="radio" value="t" wire:model.live="order">
                            Meno Recente
                        </label>
                        <label class="form-check-label" for="flexRadio2">
                            <input class="form-check-input" type="radio" value="M-m" wire:model.live="order">
                            Prezzo crescente
                        </label>
                        <label class="form-check-label" for="flexRadio3">
                            <input class="form-check-input" type="radio" value="m-M" wire:model.live="order">
                            Prezzo decrescente
                        </label>

                    </div>
                    <h3>Filtra per:</h3>
                    <h6>categoria</h6>
                    @foreach($categories as $key =>$category)
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" wire:model.live="categorie" type="checkbox" value="{{ $category->name }}">
                            <label class="form-check-label">
                                {{ $category->name }}
                            </label>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="col-10">
                <div class="row justify-content-center mb-5">
                    <div class="col-9" id="searchBar">
                        <div class="input-group">
                            <input type="text" class="form-control" wire:model.live="search" placeholder="Cerca annuncio">
                            <div class="input-group-append">
                                <button class="btn " type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center g-3">
                    @foreach($items as $item)
                    <div class="col-10 animationCard" wire:key="{{ $item->id }}">
                        <x-itemCard :$item />
                    </div>
                    @endforeach
                </div>


            </div>
            {{ $items->withQueryString()->links("components.pagination") }}
        </div>