<x-layout-main>


    <div id="item" >
        <div class="card mx-5 py-3">

            <div class="card-body py-3  text-center row">
                <div class="row mb-5">
                    <h1 class="d-flex justify-content-center m-4  ">
                        {{$item->title}}
                    </h1>
                </div>

                <div class=" col-lg-4 ">
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
                                <img src="{{asset($image->image)}}" class="d-block w-100 rounded mx-auto object-fit-contain" alt="">
                            </div>
                            @endforeach

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    @else
                    <img src="{{asset('images/NotImg.jpg') }}" id="notImg" class="d-block w-100 rounded mx-auto object-fit-contain" alt="" />

                    @endif
                </div>

                <div class="col-lg-8">
                    
                    <div class=" m-2 ">
                        <h2 >Categorie</h2>
                        <div class="row">
                            <div class=" col col-12">

                                <ul class="d-flex align-items-start " >
                                    @foreach ($item->categories as $category)
                                    <li class="list-group-item "><a class="text-dark" href=""> {{$category->name}}</a></li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>

                    </div>
                    <div class="m-2">
                        <h2 class="m-3 ">Descrizione</h2>
                        <div class="fs-5">
                            {{$item->description}}
                        </div>
                        
                    </div>
                    <div id="prezzo-contatta" >
                        <div class="d-flex flex-row justify-content-center mb-4 ">
                            <h4 class="mb-1 me-1"> {{ number_format($item->price, 2, ',', '.')}}€</h4>
                            <span class="text-danger"><s> {{ number_format(($item->price+$item->price*20/100), 2, ',', '.')}}€</s></span>
                        </div>
                        <a class="btn btn-sm btn-primary fs-5"  href="{{route('chat', $item)}}">Contatta</a>
                    </div>
                </div>

                
            </div>
        </div>

    </div>
</x-layout-main>