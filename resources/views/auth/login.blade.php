<x-layout-main>

    <div class="container" id="login">
        <div class="row">
            <div class="col-lg-4 col-md-5 mx-auto mt-5">
                <div class="card">
                    <span class="d-flex justify-content-end">
                        <a id="authG" href="{{ url('auth/google') }}">
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
                                <input type="email" name="email" id="email" @error('email') is-invalid @enderror class="input" value="{{old('email')}}">
                                @error('email')
                                <span class="text-danger small"> {{$message}} </span> @enderror
                            </div>
                            <div class="m-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" @error('password') is-invalid @enderror class="input">
                                @error('password')
                                <span class="text-danger small"> {{$message}} </span> @enderror
                            </div>
                            <div class="mt-5 mb-3 mx-3 d-flex justify-content-center">
                                <button type="submit" id="confirm">Accedi</button>
                            </div>
                            <div class=" d-flex justify-content-center">
                                <div>Se non hai un account</div>
                                <a id="changePage" href="/register">Registrati</a>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

</x-layout-main>