<x-layout-main>


    <div>
        <div class="card">
            <div class="card-body py-3 text-center">
                <h3>
                    {{ $title }}
                </h3>
                <div class=" col-lg-3 ">
                    <div id="carouselExampleCaptions" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://images.ctfassets.net/l7x57e7jkz0c/2tDMBA5HmCHVrJ5Q7uMcOq/8eda8946f664ad684736c20866c3292b/5338w3-BH-CCGAS-Web-Header---1400x400---Book-Appointment-WRK.jpg" class="d-block w-100 rounded mx-auto" alt="photo1">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Cerca</h5>
                            </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://www.ecaldwellstyle.com/wp-content/uploads/2019/05/E-Caldwell-Style-Closet-Overhaul-Banner-1400x400.jpg" class="d-block w-100 rounded mx-auto" alt="photo2">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Vendi</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://buildingbiologyinstitute.org/wp-content/uploads/2019/03/products-stores-1400x400.jpg" class="d-block w-100 rounded mx-auto" alt="photo3">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Compra</h5>
                            </div>
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
                <div class="m-2 ">
                    <!-- {{-- descrizione --}} -->
                </div>
            
            
                <div class="mt-5">
                    <!-- {{-- {{ number_format($accessory->price, 2, ',', '.')}}€ --}} -->
                </div>
                
                <div class="mt-5">
                    <a class="btn btn-sm btn-primary" href="{{ route ('article', $cardId) }}">Aquista</a>
                </div>
            </div>
        </div>

    </div>
</x-layout-main>