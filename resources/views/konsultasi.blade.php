@extends('layout.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/konsultasi-style.css') }}">
    <div class="container">
        <title>Sistem Pakar Hama Padi || Konsultasi</title>
        {{-- <h2>Ini Halaman Konsultasi</h2> --}}
        <section>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="/konsultasi/hasil">
                @csrf
                <div class="checkbox-group">
                    <h3>Silahkan Centang atau Pilih Gejala yang Terdapat pada Tanaman Padi Anda:</h3>
                    @foreach ($gejala as $item)
                        <div class="checkbox-item">
                            <input type="checkbox" id="gejala{{ $item->id }}" name="gejala[]" value="{{ $item->id }}">
                            <label for="gejala{{ $item->id }}">{{ $item->symptom }}</label>
                        </div>
                    @endforeach
                </div>

                <button type="submit">Submit</button>
            </form>
        </section>
    </div>
@endsection
