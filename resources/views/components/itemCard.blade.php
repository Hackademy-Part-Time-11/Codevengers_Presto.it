<section style="background-color: #eee;">
    <div class="row justify-content-center mb-3">
        <div class="col-md-12 col-xl-10">
            <div class="card shadow-0 border rounded-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                            <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                <img src="{{ asset($item->item_images()->first()->image) }}" class="w-100" />
                                <a href="#!">
                                    <div class="hover-overlay">
                                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <h5>{{$item->title}}</h5>
                            <div class="row">

                                @foreach($item->categories as $category)

                                <div class="col-2">
                                    {{$category->name}}
                                </div>
                                @endforeach
                            </div>
                            <p class="text-truncate mb-4 mb-md-0">
                                {{$item->description}}
                            </p>
                        </div>
                        <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                            <div class="d-flex flex-row align-items-center mb-1">
                                <h4 class="mb-1 me-1"> {{ number_format($item->price, 2, ',', '.')}}€</h4>
                                <span class="text-danger"><s> {{ number_format(($item->price+$item->price*20/100), 2, ',', '.')}}€</s></span>
                            </div>
                            <h6 class="text-success">Free shipping</h6>
                            <div class="d-flex flex-column mt-4">
                                <a class="btn btn-primary btn-sm" href="{{route('items.show', $item)}}">DETTAGLI</a>
                                <a class="btn btn-outline-primary btn-sm mt-2">ACQUISTA</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>