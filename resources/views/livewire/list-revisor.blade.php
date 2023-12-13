<div>
    <div>
        <style>
            .img{
                width: 100px;
                height: 100px;
                background-position: center;
                background-size: contain;
                background-repeat: no-repeat;
                border: 1px solid black;
                border-radius: 10px;
            }
            .align-middle{
                width: 15%;
            }
            #button{
                height: 100%;
                width: 100%;
                border: 0;
                margin: 0;
                opacity: 0;
                color: white;
                background-color: rgba(0, 0, 0, 0.4);
            }
            #button:hover{
                opacity: 1;
            }
        </style>
        <div class="row mb-4">
                <div class="col-md-6">
                    <h1>articoli in accettazione</h1>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('items.create') }}" class="btn btn-primary">Crea Articolo</a>
                </div>
            </div>
        
            <x-success />
        
            <div class="col-12 mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titolo</th>
                            <th>Categorie</th>
                            <th>images</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                @foreach($item->categories as $category)
                                    <span class="me-2 fw-bold">{{ $category->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="d-flex">
                                @foreach($item->item_images as $image)
                                    <div class="img mx-2" style="background-image: url('{{asset($image->image)}}');">
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
                                    <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-secondary">dettagli</a>
                                    <form action="{{ route('items.destroy', $item) }}" class="d-inline ms-2" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">elimina</button>
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
