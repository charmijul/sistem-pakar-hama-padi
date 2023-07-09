@extends('layout.main')

@section('container')
<link rel="stylesheet" href="{{ asset('css/gejala/create-style.css') }}">
<div class="container">
    <title>Sistem Pakar Hama Padi</title>
    <h2>ini halaman tambah data gejala</h2>
    <section>
        <form action="{{ route('kelola-gejala.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="symptom">Gejala</label>
                <input type="text" name="symptom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="hama">Hama</label>
                <select name="hama[]" class="form-control" multiple required>
                    @foreach($hamaList as $hama)
                        <option value="{{ $hama->id }}">{{ $hama->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        
    </section>
</div>
@endsection