<x-layout-main>

    <div class="container" id="login">
        <div class="row">
            <div class="col-lg-3 col-md-4 mx-auto mt-5">
                <div class="card">
                    <span class="d-flex justify-content-end">
                        <a href="{{ url('auth/google') }}">
                            <i class="bi bi-google"></i>
                        </a>
                    </span>
                    <div class="card-header">
                        <h1>Accedi</h1>
                    </div>
                    <div class="m-2">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="m-3 d-flex flex-column">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" @error('email') is-invalid @enderror class="inputLogin" value="{{old('email')}}">
                                @error('email')
                                <span class="text-danger small"> {{$message}} </span> @enderror
                            </div>
                            <div class="m-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" @error('password') is-invalid @enderror class="inputLogin">
                                @error('password')
                                <span class="text-danger small"> {{$message}} </span> @enderror
                            </div>
                            <div class="mt-5 mb-3 mx-3 d-flex justify-content-center">
                                <button type="submit" id="accedi">Accedi</button>
                            </div>
                            <div class=" d-flex justify-content-center">
                                <div>Se non hai un account</div>
                                <a href="/register">Registrati</a>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

</x-layout-main>