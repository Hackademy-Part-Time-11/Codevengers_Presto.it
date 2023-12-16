<x-layout-main>


    <div id="item">
        <div class="card mx-5 py-3" id="sfondo-card">

            <div class="card-body py-3 row justify-content-around">
                <div class="col-12 mb-5">
                    <h1 class="d-flex justify-content-center m-4  ">
                        {{$item->title}}
                    </h1>
                </div>

                <div class="col-3">
                    @if(optional($item->item_images()->first())->image)
                    <div id="carouselExampleCaptions" class="carousel slide">
                        <div class="carousel-indicators">
                            @foreach($item->item_images as $key=>$image)
                            @if($key == 0 )
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}" class="active" aria-current="true" aria-label='{{"Slide ".$key}}'></button>
                            @else
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}" aria-label='{{"Slide ".$key}}'></button>
                            @endif
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach($item->item_images as $key=>$image)
                            <div class="carousel-item  {{ $key == 0 ? 'active' : '' }}">
                                <div class="d-flex justify-content-center">
                                    <div class="img" style="background-image: url('{{ optional($image)->image ? asset($image->image) : asset('images/NotImg.jpg') }}');">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div>
                                <button class="carousel-control-prev m-0" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next m-0" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            @else
                            <img src="{{asset('images/NotImg.jpg') }}" id="notImg" class="d-block w-100 rounded mx-auto object-fit-contain" alt="" />

                            @endif
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <ul class="d-flex">
                            @foreach ($item->categories as $category)
                            <li class="list-group-item "><a href=""> {{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <div class="col-lg-6 d-flex flex-column  justify-content-between align-items-center">

                    <div class="d-flex flex-column align-items-center">
                        <h2 class="m-3 ">Descrizione</h2>
                        {{$item->description}}
                    </div>
                    <div>
                        <h2>Aquista a:</h2>
                        <div id="prezzo-contatta d-flex justify-content-center">
                            <div class="d-flex justify-content-center mb-4 ">
                                <h4 class="mb-1 me-1"> {{ number_format($item->price, 2, ',', '.')}}€</h4>
                                <span class="text-danger"><s> {{ number_format(($item->price+$item->price*20/100), 2, ',', '.')}}€</s></span>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a class="contatta" href="{{route('chat', $item)}}">Contatta il venditore</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


        </div>
    </div>

    </div>
</x-layout-main>