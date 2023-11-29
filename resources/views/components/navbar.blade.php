<nav class="navbar navbar-expand-lg bg-body-tertiary">
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
                <li class="nav-item d-flex align-items-center p-2">
                    <a id="pubblicaAnnuncio" class="nav-link button" href="{{ route('items.create') }}">Pubblica un Annuncio</a>
                </li>
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
                                    <li><a class="dropdown-item" href="/login">Accedi</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/register">Registrati</a></li>
                                    @endauth
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
        
    </div>
</nav>