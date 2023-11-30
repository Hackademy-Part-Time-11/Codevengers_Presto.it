<x-layout-main>


    <div id="item" >
        <div class="card">
            
            <div class="card-body py-3 text-center row">
                <div class="row">
                    <h3 class="d-flex justify-content-center m-4">
                        {{$item->title}}
                    </h3>
                </div>
                
                <div class=" col-lg-4 ">
                    <div id="carouselExampleCaptions" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active ">
                                <img  src="https://picsum.photos/400/600" class="d-block w-100 rounded mx-auto object-fit-contain" alt="photo1">
                            
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/400/601" class="d-block w-100 rounded mx-auto object-fit-contain" alt="photo2">
                                
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/400/602" class="d-block w-100 rounded mx-auto object-fit-contain" alt="photo3">
                            
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/400/603" class="d-block w-100 rounded mx-auto object-fit-contain" alt="photo3">
                            
                            </div>
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
                </div>
                
                <div class="col-lg-8">
                    <div class="m-2">
                        <h3 class="m-3">Descrizione</h3>
                        {{$item->description}}
                    </div>
                    <div class=" m-2 ">
                        <h3 class="">Categorie</h3>
                        <div class="row">
                            <div class=" col col-12">
                            
                                <ul class="d-flex list-group align-items-start">
                                    @foreach ($item->categories as $category)
                                        <li class="list-group-item "><a class="text-dark" href=""> {{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            
            
                <div class="mt-5">
                    <!-- {{-- {{ number_format($accessory->price, 2, ',', '.')}}€ --}} -->
                </div>
                
                <div class="mt-3">
                    <div class="d-flex flex-row justify-content-center mb-4">
                        <h4 class="mb-1 me-1"> {{ number_format($item->price, 2, ',', '.')}}€</h4>
                        <span class="text-danger"><s> {{ number_format(($item->price+$item->price*20/100), 2, ',', '.')}}€</s></span>
                    </div>
                    <a class="btn btn-sm btn-primary" href="">Aquista</a>
                </div>
            </div>
        </div>

        <div class="m-5">
            <a class="btn btn-sm btn-primary" href="{{ route('listItems') }}"><-- vai Indietro</a>
        </div>


    </div>
</x-layout-main>