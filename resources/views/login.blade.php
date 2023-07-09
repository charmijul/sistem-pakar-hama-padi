@extends('layout.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/login-style.css') }}">
    <div class="container">
        <title>Sistem Pakar Hama Padi</title>
        <section>
            <h2 class="text-center">Form Login</h2>
            <form action="/login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                        placeholder="Masukkan email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                        placeholder="Masukkan password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </section>
    </div>
@endsection
