<x-layout-main>

    <div class="container" id="register">
        <div class="row">
            <div class="col-lg-4 col-md-5 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h1>Registrati</h1>
                    </div>
                    <div class="m-2">

                        <form action="/register" method="POST">
                            @csrf
                            <div class="m-3">
                                <label for="name">Nome</label>
                                <input clas type="text" name="name" id="name" @error('name') is-invalid @enderror class="input" value="{{old('name')}}">
                                @error('name')
                                <span class="text-danger small"> {{$message}} </span> @enderror
                            </div>
                            <div class="m-3">
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
                            <div class="m-3">
                                <label for="password_confirmation">Conferma Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="input">

                            </div>
                            <div class="mt-5 mb-3 d-flex justify-content-center">
                                <button type="submit" id="confirm">Registrati</button>
                            </div>
                            <div class=" d-flex justify-content-center">
                                <div>Se non hai un account</div>
                                <a id="changePage" href="/login">Accedi</a>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>


</x-layout-main>