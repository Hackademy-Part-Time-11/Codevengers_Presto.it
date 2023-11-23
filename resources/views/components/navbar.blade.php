<nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid d-flex align-items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
        <span class="navbar-brand py-2">{{ config('app.name') }}</span>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Annuncio.index') }}">Articoli in vendita</a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <button>Pubblica un annuncio</button>
                </li>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

            </ul>
            {{-- {{ auth()->user()->email }} --}}

            
            <ul class="navbar-nav ms-auto mb-2 mb-2 mb-lg-0">
                @auth
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dopdown-item m-3" href="{{route('account')}}">Account</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit"> Logout </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Accedi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Registrati</a>
                </li>
                @endauth
            </ul>
            
        </div>
    </div>
    
</nav>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
        <span class="navbar-brand py-2">{{ config('app.name') }}</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Annuncio.index') }}">Articoli in vendita</a>
                </li>
                
                <li class="nav-item dropdown ">
                    <div class="justify-content-end d-flex" id="destra">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown link
                        </a>
                    </div>
                    <ul class="dropdown-menu">
                        <ul class="navbar-nav ms-auto mb-2 mb-2 mb-lg-0">
                            @auth
                            <li class="nav-item dropdown ">
                                
                                    <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown
                                    </a>
                                
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dopdown-item m-3" href="{{route('account')}}">Account</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button class="btn btn-danger" type="submit"> Logout </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            
                        </ul>
                        <li><a class="dropdown-item" href="/login">Accedi</a></li>
                        <li><a class="dropdown-item" href="/register">Registrati</a></li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>