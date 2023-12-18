<div>
    <div id="listTable">
        <div class="row mb-4">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <h1>I miei Annunci</h1>
                <a href="{{ route('items.create') }}"><i class="bi bi-plus-square"></i></a>
            </div>
        </div>

        <x-success />

        <div class="col-12 mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Verified</th>
                        <th>Titolo</th>
                        <th>Categorie</th>
                        <th>images</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $key=>$item)
                    <tr>
                        <td class="align-middle text-center">
                            {{ $key+1 }}
                        </td>
                        <td class="align-middle text-center">
                            @if($item->is_accepted)
                            <i class="bi bi-check-circle-fill green"></i>
                            @else <i class="bi bi-x-circle-fill red"></i>
                            @endif
                        </td>
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
                                <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-secondary">modifica</a>
                                <form action="{{ route('items.destroy', $item) }}" class="d-inline ms-2" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">cancella</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
   
    {{ $items->links("components.pagination") }}
</div>