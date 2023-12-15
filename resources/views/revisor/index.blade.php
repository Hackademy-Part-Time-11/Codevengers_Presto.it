<x-layout-main>
    <div id="cardItemRevision" class="container">
        <div class="row">
            <div class="col-12 p-3">
                <h1 class="display-2">Titolo: {{ $item->title }}</h1>
            </div>
            <div>

            </div>
        </div>
        <div class="row px-4" id="carosello">
            <div class="col-12">
                @if(optional($item->item_images()->first())->image)
                <div id="carouselExampleCaptions" class="carousel slide">

                    <div class="carousel-inner">
                        @foreach($item->item_images as $key=>$image)
                        <div class="carousel-item  {{ $key == 0 ? 'active' : '' }}">
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{asset($image->image)}}" class="d-block rounded mx-auto object-fit-contain" alt="">
                                </div>
                                <div class="col-6">
                                    Controllo contenuto immagine
                                    <ul>
                                        <li><i class="{{$image->adult}}"></i> Contenuti per Adulti</li>
                                        <li><i class="{{$image->spoof}}"></i> Parodia</li>
                                        <li><i class="{{$image->medical}}"></i> Mediche</li>
                                        <li><i class="{{$image->violence}}"></i> Violenza</li>
                                        <li><i class="{{$image->racy}}"></i> Razzismo</li>
                                    </ul>
                                </div>
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
        <div class="row p-3">

            <div class="col-12">

                <h4 class="d-flex justify-content-center">DESCRIZIONE:</h4>


                <p>{{$item->description}}</p>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-12 d-flex justify-content-center">
                <form action=" {{ route('revisor.accept_item', ['item' => $item])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success shadow">Accetta</button>
                </form>
                <form action=" {{ route('revisor.reject_item', ['item' => $item])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger shadow">Rifiuta</button>
                </form>
            </div>

        </div>

    </div>
</x-layout-main>