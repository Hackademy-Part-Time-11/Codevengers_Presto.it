
<x-layout-main>  
    
    <h1>{{$title}}</h1>
  
  
  <div class="mt-5 container">
    <div class="row g-3">
    @foreach($items as $item)
    @if($item ['visible'])
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
      <h3>{{$item['title']}}</h3>
      <img class="w-50 d-flex mx-auto" src="https://i.ebayimg.com/images/g/DW4AAOSwvwRcVRyX/s-l1200.webp" alt="newspaper">
      <div class= "mt-5">
        <a href="{{route('item', $item['id'])}}" class="btn btn-sm btn-warning text-white">Visualizza</a>
      </div>
      </div>
    </div>
  </div>
  @endif
      @endforeach
    </div>
  </div><br><br>
      
    
  </x-layout-main>