@extends('layout.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/home-style.css') }}">
    <div class="container">
        <title>Sistem Pakar Hama Padi</title>
        {{-- <h2>Halaman Home</h2> --}}
        <section>
            <img src="{{ asset('storage/images/logo-padi.png') }}" class="mt-3" width="150" height="150">
                <h3>Sistem Pakar Diagnosa Hama Tanaman Padi</h3>
                <p>Website ini bertujuan untuk membantu para petani untuk mengetahui hama yang menyerang tanaman padi mereka.</p> <P>Berdasarkan data-data yang diberikan oleh pakar dari Balai Pengkajian Teknologi Pertanian Kalimatan Timur (BPTP)</p>
                <p>lalu dikombinasikan dengan metode <a href="https://www.google.com/search?q=metode+naive+bayes">Naive Bayes</a> untuk menghitung nilai Vektor (v) untuk mendapatkan hasil diagnosa hama</p>
                <a href="/konsultasi"><button class="btn btn-warning">Mulai</button></a>
        </section>
    </div>
@endsection
