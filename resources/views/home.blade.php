<x-layout-main>

  <div id="HomePage">
    <br><br>
    <h2>L'e-commerce su misura per te</h2><br><br><br><br>

    <div class="banner">
      <img src="https://www.berettaclima.it/media/contact_2.jpg" alt="banner" class="img-banner">
    </div>
    
    <br><br><br><br>

    <div class="categories-container">
      <div class="container mt-5 mx-auto">
        <div class="row mx-auto">
          @foreach($categories as $category)
          <div class="col-md-4 mb-4 mx-auto">
            <a href="{{route('listItems',$category['name'] ) }}">
              <div class="card bg-dark text-light text-center w-50 mx-auto">
                <img src="https://www.practiceportuguese.com/wp-content/uploads/2017/08/Household-Items.jpg" class="card-img-top w-60" alt="{{ $category['name'] }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $category['name'] }}</h5>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <br><br>
  </div>
</x-layout-main>