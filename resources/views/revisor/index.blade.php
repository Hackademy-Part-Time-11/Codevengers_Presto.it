<x-layout-main>
    
<div class="container-fluid -bg-gradient bg-success px-5 shadow mb-4 rounded-pill">
    <div class="row">
        <div class="col-12 text-light p-5">
            <h1 class="display-2"> {{ $item_to_check ? 'Annunci da revisionare' : 'Non ci sono annunci da revisionare' }}</h1>
        </div>
        <div>
            
        </div>
    </div>
</div> 
    <div class="col-11 mx-5 "> <x-revisor /> </div> 
    @if ($item_to_check)
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/id/27/1200/400" class="img-fluid p-3 rounded" alt="...">
                    </div>
                    
                    <div class="carousel-item">
                        <img src="https://picsum.photos/id/27/1200/400" class="img-fluid p-3 rounded" alt="...">
                    </div>

                    <div class="carousel-item">
                        <img src="https://picsum.photos/id/27/1200/400" class="img-fluid p-3 rounded" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" area-hidder="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" area-hidder="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
                <div class="text-light">
                    <h5 class="card-title">Titolo: {{ $item_to_check->title }}</h5>
                    <p class="card-text">Descrizione: {{ $item_to_check->body }}</p>
                    <p class="card-footer">Pubblicato il: {{ $item_to_check->created_at->format('d/m/Y') }}</p>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <form action=" {{ route('revisor.accept_item', ['item' => $item_to_check])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success shadow">Accetta</button>
                </form>
            </div>
            <div class="col-12 col-md-6 text-end">
                <form action=" {{ route('revisor.reject_item', ['item' => $item_to_check])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger shadow">Rifiuta</button>
                </form>
            </div>
        </div>
    </div>
    @endif

</x-layout-main>