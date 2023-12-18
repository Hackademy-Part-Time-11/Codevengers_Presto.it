<div>
    <div id="listTable">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="d-flex justify-content-center">articoli in accettazione</h1>
            </div>

        </div>

        <x-success />

        <div class="col-12 mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titolo</th>
                        <th>Descrizione</th>
                        <th>images</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $key=>$item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->title }}</td>
                        <td id="description" class="overflow-auto">                       
                            <div class="me-2 text-break">{{ $item->description }}</div>
                        </td>
                        <td>
                            <div class="d-flex">
                                @foreach($item->item_images as $image)
                                <div class="img mx-2" style="background-image: url('{{asset($image->image)}}');">
                                <i class="{{$this->imageBadgeValidation($image)}} position-absolute"></i>
                                    <form action="{{ route('items.images.delete', $image) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button id="button" type="submit"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </div>
                                @endforeach
                            </div>
                        </td>
                        <td class="align-middle">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('revisor.index', $item) }}" class="btn btn-sm btn-secondary">dettagli</a>
                                <form wire:submit="acceptItem({{$item}})">
                                    <button type="submit" class="btn btn-success shadow">Accetta</button>
                                </form>
                                <form wire:submit="rejectItem({{$item}})">
                                    <button type="submit" class="btn btn-danger shadow">Rifiuta</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>