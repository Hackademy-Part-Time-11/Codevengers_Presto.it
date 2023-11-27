<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Presto.it</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <x-layout-main>
            <div class="contain">
                
                @if (/*'value'=1*/){ 
                    {{-- login --}}
                    <div class="row">
                        <div class="col-lg-5 mx-auto mt-5">
                            <div class="card">
                                <div class="card-header">
                                    Accedi all'EMAIL
                                </div>
                                <div class="m-2">
                                    <form action="/login" method="POST">
                                        @csrf
                                        <div class="m-3">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" @error('email') is-invalid @enderror class="form-control" value= "{{old('email')}}">
                                            @error('email')
                                            <span class="text-danger small"> {{$message}} </span> @enderror
                                        </div>
                                        <div class="m-3">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" @error('password') is-invalid @enderror class="form-control">
                                            @error('password')
                                            <span class="text-danger small"> {{$message}} </span> @enderror
                                        </div>
                                        <div class="mt-5 mb-3 mx-3">
                                            <button type="submit" class="btn btn-primary">Accedi</button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                }@else (){
                    {{-- registrati --}}
                    <div class="row">
                        <div class="col-lg-5 mx-auto mt-5">
                            <div class="card">
                                <div class="card-header">
                                    Registrati con l'EMAIL
                                </div>
                                <div class="m-2">
                                    <form action="/register" method="POST">
                                        @csrf
                                        <div class="m-3">
                                            <label for="name">Nome</label>
                                            <input type="text" name="name" id="name" @error('name') is-invalid @enderror class="form-control" value= "{{old('name')}}">
                                            @error('name')
                                            <span class="text-danger small"> {{$message}} </span> @enderror
                                        </div>
                                        <div class="m-3">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" @error('email') is-invalid @enderror class="form-control" value= "{{old('email')}}">
                                            @error('email')
                                            <span class="text-danger small"> {{$message}} </span> @enderror
                                        </div>
                                        <div class="m-3">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" @error('password') is-invalid @enderror class="form-control">
                                            @error('password')
                                            <span class="text-danger small"> {{$message}} </span> @enderror
                                        </div>
                                        <div class="m-3">
                                            <label for="password_confirmation">Conferma Password</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                            
                                        </div>
                                        <div class="mt-5 mb-3 mx-3">
                                            <button type="submit" class="btn btn-primary">Registrati</button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                }
                    
                @endif
                    
                @endif
                
                
            </div>
        </x-layout-main>
        