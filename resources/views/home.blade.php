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

  </div>
</x-layout-main>