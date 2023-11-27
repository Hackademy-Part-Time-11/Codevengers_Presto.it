<x-layout-main>
@vite('resources/css/itemList.scss')
    <div class="row" id="item-list">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="row">

                <h1>Titolo <a href="{{ route('items.create') }}"><i class="bi bi-plus-square"></i></a></h1>
                <form action="" id="searchBar">
                    <input type="text">
                    <button><i class="bi bi-search"></i></button>
                </form>
            </div>
            <div class="row">
                <div class="row g-3">
                    @foreach($items as $item)
                    <div class="col-12">
                        <x-itemCard :$item />
                    </div>
                    @endforeach

                </div>
            </div>



</x-layout-main>