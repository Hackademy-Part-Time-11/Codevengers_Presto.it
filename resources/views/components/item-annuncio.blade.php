<div>
    <div class="card">
    <div class="card-body py-3 text-center">
        <h4>
            {{ $title }}
        </h4>

        <div class="m-2 ">
            {{-- descrizione --}}
        </div>

        <div class="img-fluid img m-3">
            <img src="{{ Storage::url($item->image) }}">
        </div>

        <div class="mt-5">
            {{-- {{ number_format($accessory->price, 2, ',', '.')}}€ --}}
        </div>
        
        <div class="mt-5">
            <a class="btn btn-sm btn-primary" href="{{ route ('article', $cardId) }}">vai all'articolo</a>
        </div>
    </div>
</div>

</div>