<section id="item-card">
    <div class="row justify-content-center mb-2">
        <div class="col-md-12 col-xl-10">
            <div class="row  cardItem">
                <div class="col-3 img  border-end" style="background-image: url('{{ optional($item->item_images()->first())->image ? asset($item->item_images()->first()->image) : asset('images/NotImg.jpg') }}');">
                    <div>

                    </div>
                </div>
                <div class="col-6">
                    <h4>{{$item->title}}</h4>

                    <div class="categories ">
                        @foreach($item->categories as $category)
                        <span>
                            {{$category->name}}
                        </span>

                        @endforeach
                    </div>


                    <div>

                       Venduto da: <h6>{{$item->user->name}}</h6>
                    </div>
                </div>
                <div class="col-3 border-start">
                    <div class="d-flex flex-row align-items-center mb-1">
                        <h4 class="mb-1 me-1"> {{ number_format($item->price, 2, ',', '.')}}€</h4>
                        <span class="text-danger"><s> {{ number_format(($item->price+$item->price*20/100), 2, ',', '.')}}€</s></span>
                    </div>
                    <h6 class="text-success">Free shipping</h6>
                    <div class="d-flex flex-column">
                        <a class="dettagli" href="{{route('items.show', $item)}}">Dettagli</a>
                        <a class="contatta" href="{{route('chat', $item)}}">Contatta</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>