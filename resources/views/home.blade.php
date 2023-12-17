<x-layout-main>
  @vite('resources/js/home.js')
  <div id="HomePage">
    <header>
      <h1>{{__('ui.allAnnouncements')}}</h1>

      <div class="banner">
        <a href="https://www.playstation.com/it-it/" target="blank">
          <img src="https://www.xboom.in/wp-content/uploads/2023/04/dji-mavic-3-27.png" alt="banner" class="img-banner">
        </a>
      </div>

    </header>

    <section>
      <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach($items as $key=>$group)
          <div class="carousel-item {{$key == 0 ? 'active':''}}">
            <div class="row">
              @foreach($group as $item)
              <div class="col-12 col-sm-6 col-lg-4 col-xl-2 mb-4 mx-auto">
                  <div class="customCard d-flex flex-column justify-content-between">
                    <div style="background-image: url('{{ optional($item->item_images()->first())->image ? asset($item->item_images()->first()->image) : asset('images/NotImg.jpg') }}');" class="img-top">
                    </div>
                    <h5 class="d-flex justify-content-center text-center">{{ $item->title }}</h5>
                    <div class="row">
                      <div class="col-12 d-flex justify-content-between">
                        <div class="col-6 prezzo">
                          <h4 > {{ number_format($item->price, 2, ',', '.')}}€</h4>
                        </div>
                        <div class="col-6 dettagli">
                        <a href="{{route('items.show', $item)}}">Dettagli</a>
                        </div>

                      </div>
                    </div>
                  </div>
              </div>
              @endforeach
            </div>
          </div>
          @endforeach
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span aria-hidden="true"><i class="bi bi-arrow-left-circle-fill"></i></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span aria-hidden="true"><i class="bi bi-arrow-right-circle-fill"></i></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>

    <div class="card-container row align-items-center justify-content-around">
      <div class=" col-12 col-md-6 card-content">
        <h2 class="pb-3">Nasce Presto.it!</h1>
          <p> Il progetto viene sviluppato a partire da novembre 2023 da un piccolo team composto da Alessio Piras, Francesco Adduce e Alessandro Ricci, tutti ex studenti di Aulab Hackademy. </p>
          <p> Circa un mese più tardi viene alla luce Presto.it! </p>
      </div>

      <div class="col-12 col-md-4 card-image">
        <img src="https://www.theeducationpeople.org/media/4357/hands-head-cogs.jpg" alt="Immagine di esempio">
      </div>
    </div>

    <div class="card-container row align-items-center justify-content-around">
      <div class="col-12 col-md-4 card-image">
        <img src="https://www.asendia.co.uk/hubfs/top%20ecommerce%20blog%20pic.png" alt="Immagine di esempio">
      </div>

      <div class="col-12 col-md-6 card-content">
        <h2 class="pb-3">Perché scegliere Presto.it!</h1>
          <p> Vendere e acquistare non è mai stato così semplice!</p>
          <p>Scegli le categorie, fotografa e descrivi il tuo articolo e sei pronto per il tuo primo annuncio.</p>
          <p>Cerca quello che desideri tra migliaia di annunci e chatta con i venditori.</p>
      </div>
    </div>

  </div>
</x-layout-main>