@extends('layout.main')

@section('container')
<link rel="stylesheet" href="{{ asset('css/gejala/edit-style.css') }}">
<div class="container">
    <title>Sistem Pakar Hama Padi</title>
    <h2>ini halaman edit data gejala</h2>
    <section>
        <form action="{{ route('kelola-gejala.update', $gejala->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="symptom">Gejala</label>
                <input type="text" class="form-control" id="symptom" name="symptom" value="{{ $gejala->symptom }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </section>
</div>
@endsection