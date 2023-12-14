<x-layout-main>

    <div class="container-fluid px-5 shadow mb-4 rounded-pill">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2"> {{ $item->title }}</h1>
            </div>
            <div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 bg-white p-4">
                @if(optional($item->item_images()->first())->image)
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        @foreach($item->item_images as $key=>$image)
                        <div>
                        @if($key == 0 )
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}" class="active" aria-current="true" aria-label='{{"Slide ".$key}}'></button>
                        @else
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}" aria-label='{{"Slide ".$key}}'></button>
                        @endif
                        </div>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach($item->item_images as $key=>$image)
                        <div class="carousel-item  {{ $key == 0 ? 'active' : '' }} d-flex">
                            <div class="col-6">
                              <img src="{{asset($image->image)}}" class="d-block w-100 rounded mx-auto object-fit-contain" alt="">  
                            </div>
                            <div class="col-6">
                                Controllo contenuto immagine 
                                <ul>
                                    <li><i class="{{$image->adult}}"></i></li>
                                    <li><i class="{{$image->spoof}}"></i></li>
                                    <li><i class="{{$image->medical}}"></i></li>
                                    <li><i class="{{$image->violence}}"></i></li>
                                    <li><i class="{{$image->racy}}"></i></li>
                                </ul>
                            </div>
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
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <form action=" {{ route('revisor.accept_item', ['item' => $item])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success shadow">Accetta</button>
                </form>
            </div>
            <div class="col-12 col-md-6 text-end">
                <form action=" {{ route('revisor.reject_item', ['item' => $item])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger shadow">Rifiuta</button>
                </form>
            </div>
        </div>
    </div>
</x-layout-main>