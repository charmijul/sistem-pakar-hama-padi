@extends('layout.main')

@section('container')
<link rel="stylesheet" href="{{ asset('css/diagnosa-style.css') }}">
<div class="container">
    <title>Sistem Pakar Hama Padi || Diagnosa</title>
    <h2>Ini Halaman Hasil Diagnosa Sistem</h2>
    <section>
        <div class="gejala">
            <h4>Gejala yang Anda Inputkan:</h4>
            <ul>
                @foreach($inputGejala as $item)
                <li>{{ $item['gejala'] }}</li>
                @endforeach
            </ul>
        </div>
        
        <div class="hasil-diagnosa">
            <h4>Berdasarkan gejala-gejala yang Anda inputkan, kemungkinan terbesar hama yang menyerang tanaman padi anda adalah:</h4>
            <div class="hasil-item">
                <h4>{{ $v->first()['nama_hama'] }}</h4>
                <p>Nilai V: <span class="nilai-v">{{ sprintf('%.5E', $v->first()['v_gejala']) }}</span></p>
            </div>
            
            {{-- jika ingin menampilkan semua hama --}}
            {{-- @foreach($v as $data)
            <div class="hasil-item">
                <h5>{{ $data['nama_hama'] }}</h5>
                <p>Nilai V: <span class="nilai-v">{{ sprintf('%.5E', $data['v_gejala']) }}</span></p>
            </div>
            @endforeach --}}
        </div>
    </section>
</div>
@endsection
