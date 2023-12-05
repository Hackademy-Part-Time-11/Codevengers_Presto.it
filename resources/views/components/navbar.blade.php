<nav class="navbar navbar-expand-lg bg-body-tertiary p-0">
    <div class="container-fluid">
        <a id="logo" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo"> </a>

        <span>{{ config('app.name') }}</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse row" id="navbarNavDropdown">
            <ul class="navbar-nav ">
                <li class="nav-item p-2 ms-3">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link" href="{{ route('listItems') }}">Articoli in vendita</a>
                </li>
                @auth 
                @if(Auth::user()->is_revisor)
                <li class="nav-item p-2">
                    <a class="nav-link" href="{{ route('revisor.index') }}">Area revisore
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ App\Models\Item::toBeRevisionedCount() }}
                            <span class="visually-hidden">Messaggi non letti</span>
                        </span>
                    </a>
                </li>
                @endif
                @endauth
                <li class="nav-item d-flex align-items-center p-2">
                    <a id="pubblicaAnnuncio" class="nav-link button" href="{{ route('items.create') }}">Pubblica un Annuncio</a>
                <li class="nav-item d-flex ms-auto p-2">
                    
                        
                    
                    <div class="collapse navbar-collapse d-flex justify-content-center me-5 s" id="navbarNavDropdown">
                        <ul class="navbar-nav ">
                            <li class="nav-item dropdown ">                            
                                <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @auth                                
                                    Opzioni                            
                                    @else
                                    Login
                                    @endauth                                
                                </a>
                                <ul class="dropdown-menu custom-dropdown-menu">
                                
                                    @auth
                                    {{-- <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </a> --}}
                                    <li><a class="dopdown-item form-control-sm" href="{{route('account')}}">Account</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button class="btn btn-danger" type="submit"> Logout </button>
                                        </form>
                                    </li>
                                
                                    @else
                                    <li class="dropdown-item"><a class="dropdown-item" href="/login">Accedi</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li class="dropdown-item"><a class="dropdown-item" href="/register">Registrati</a></li>
                                    @endauth
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="btn-group" id="lingua">
                        <button type="button"  class="btn fw-bold py-0 dropdown-toggle "  data-bs-toggle="dropdown" aria-expanded="false">
                            Lingua
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end justify-content-center  " >
                            <li class=" nav-link d-flex justify-content-start mb-1">  <x-locale  lang="en" nation="gb"/></li>
                            <li class=" nav-link d-flex justify-content-start my-1">  <x-locale  lang="it" nation="it"/></li>
                            <li class=" nav-link d-flex justify-content-start mt-1">  <x-locale  lang="es" nation="es"/></li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
        
    </div>
</nav>