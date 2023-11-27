<x-layout-main>



    <h1>Presto.it</h1>
    <h2>L'e-commerce su misura per te</h2><br><br>
    

    <div id="carouselExampleCaptions" class="carousel slide">
      <div id="titolo" class=" shadow p-3 mb-5 bg-body-tertiary rounded">
        
        <h1 class="px-3" >PRESTO.it </h1>
        <br>
        <h4 > L'e-commerce su misura per TE</h4>
      </div>
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://immagini.trovaprezzi.it/magazine/2019/01/cameretta-neonato.jpg" class="d-block w-100 rounded mx-auto" alt="photo1">
            <div class="carousel-caption d-none d-md-block">
              <h5>Cerca</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://a0.muscache.com/im/pictures/a4ac7ee2-d51f-47a3-96fc-6e76a9eea04e.jpg" class="d-block w-100 rounded mx-auto" alt="photo2">
            <div class="carousel-caption d-none d-md-block">
              <h5>Vendi</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://dq5r178u4t83b.cloudfront.net/wp-content/uploads/sites/41/2023/03/28131705/6582-42-1200x400.jpg" class="d-block w-100 rounded mx-auto" alt="photo3">
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
      </div><br><br>

      <div class="container mt-5">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4 mb-4">
                  <a href="">
                    <div class="card">
                        <img src="{{ $category['image'] }}" class="card-img-top" alt="{{ $category['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category['name'] }}</h5>
                        </div>
                    </div>
                  </a>
                </div>
            @endforeach
        </div>
    </div>
    <br><br>
    
    </x-layout-main>
