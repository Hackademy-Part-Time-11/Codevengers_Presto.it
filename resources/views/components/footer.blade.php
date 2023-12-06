
  <div class="container">
  
    <footer class="py-4">
      <div class="row">
        <div class="col-6 col-md-2 mb-2">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
          </ul>
        </div>
  
        <div class="col-6 col-md-2 mb-3">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
          </ul>
        </div>
  
        <div class="col-6 col-md-2 mb-3">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
          </ul>
        </div>
  
        <div class="col-md-5 offset-md-1 mb-3">
          <form>
            <h5>Subscribe to our newsletter</h5>
            <p class="text-light">Monthly digest of what's new and exciting from us.</p>
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
              <label for="newsletter1" class="visually-hidden">Email address</label>
              <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
              <button type="button">Subscribe</button> 
            </div><br><br>
            <div>
                <h5 class="text-white"><a href= {{ route('job') }}>{{__('ui.LavoraNoi')}}</a></h5>
              </div>
          </form>
        </div>
      </div>

      <br>
      <div>
        <p class="text-light">Powered by:</p>
      <br>
        <span id="developers" class="d-flex justify-content-around">
          <div class="d-flex align-items-center"><a href="https://www.linkedin.com/in/francesco-adduce/" target="blank"><img src="{{ asset('images/Francesco-photo.jpg') }}" alt="developer1"></a><h5 class="m-3">Francesco Adduce</h5></div>
          <div class="d-flex align-items-center"><a href="https://www.linkedin.com/in/alessiowebdev/" target="blank"><img src="{{ asset('images/Alessio-photo.jpg') }}" alt="developer2"></a><h5 class="m-3">Alessio Piras</h5></div>
          <div class="d-flex align-items-center"><a href="https://www.linkedin.com/in/alessandro-ricci-57b553247/" target="blank"><img src="{{ asset('images/Alessandro-photo.png') }}" alt="developer3"></a><h5 class="m-3">Alessandro Ricci</h5></div>
        </span>
      
      </div>
  
      <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
        <p class="text-light">© 2023 Company, Inc. All rights reserved.</p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3"><a class="link-body-emphasis text-light" href="#"><i class="bi bi-twitter"></i></a></li>
          <li class="ms-3"><a class="link-body-emphasis text-light" href="#"><i class="bi bi-instagram"></i></a></li>
          <li class="ms-3"><a class="link-body-emphasis text-light" href="#"><i class="bi bi-facebook"></i></a></li>
        </ul>
      </div>

      
    </footer>
  </div>