
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <h1 class="navbar-brand py-2">{{ config('app.name') }}</h1>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles') }}">Articoli</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link" href="{{ route('chi-sono') }}">Chi sono</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link" href="{{ route('contatti') }}">Contatti</a>
                </li>
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
                        <li><hr class="dropdown-divider"></li>
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
                    <a  class="nav-link" href="/login">Accedi</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link" href="/register">Registrati</a>
                </li>

                @endauth
            </ul>
            
        </div>
    </div>
</nav>