<x-layout-main>

    <h1>Titolo <a href="{{ route('items.create') }}"><i class="bi bi-plus-square"></i></a></h1>
    
    <div class="mt-5 container">
        <div class="row g-3">
            @foreach($items as $item)
            <div class="col-12">
                <x-itemCard :$item />
            </div>
            @endforeach
        </div>
    </div>


</x-layout-main>