<x-layout-main>

  <div id="HomePage">
    <h1>{{__('ui.allAnnouncements')}}</h1>
    <header>
      <div class="banner">
        <img src="https://www.berettaclima.it/media/contact_2.jpg" alt="banner" class="img-banner">
      </div>

    </header>

    <section>
      <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach($items as $key=>$group)
          <div class="carousel-item {{$key == 0 ? 'active':''}}">
            <div class="row">
              @foreach($group as $item)
              <div class="col-lg-2 mb-4 mx-auto">
                <a href="{{route('items.show', $item)}}">
                  <div class="card  text-light text-center mx-auto d-flex flex-column justify-content-between">
                    <img src="{{ optional($item->item_images()->first())->image ? asset($item->item_images()->first()->image) : asset('images/NotImg.jpg') }}" class="card-img-top w-60" alt="{{$item->name }}" />
                    <h5 class="bg-dark">{{ $item->title }}</h5>
                  </div>
                </a>
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

    <div class="card-container">
      <div class="card-content">
        <h2 class="pb-3">Nasce Presto.it!</h1>
        <p> Il progetto viene sviluppato a partire da novembre 2023 da un piccolo team composto da Alessio Piras, Francesco Adduce e Alessandro Ricci, tutti ex studenti di Aulab Hackademy. </p>
        <p> Circa un mese più tardi viene alla luce Presto.it! </p>
      </div>
  
      <div class="card-image">
        <img src="https://www.theeducationpeople.org/media/4357/hands-head-cogs.jpg" alt="Immagine di esempio">
      </div>
    </div>

    <div class="card-container">
      <div class="card-image">
        <img src="https://www.asendia.co.uk/hubfs/top%20ecommerce%20blog%20pic.png" alt="Immagine di esempio">
      </div>

      <div class="card-content">
        <h2 class="pb-3">Perché scegliere Presto.it!</h1>
        <p> Vendere e acquistare non è mai stato così semplice!</p>
        <p>Scegli le categorie, fotografa e descrivi il tuo articolo e sei pronto per il tuo primo annuncio.</p>
        <p>Cerca quello che desideri tra migliaia di annunci e chatta con i venditori.</p>
      </div>
    </div>

  </div>
</x-layout-main>