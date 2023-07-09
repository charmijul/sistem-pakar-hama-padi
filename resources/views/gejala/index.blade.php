@extends('layout.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/gejala/index-style.css') }}">
    <div class="container">
        <title>Sistem Pakar Hama Padi</title>
        <h2>ini halaman kelola data gejala</h2>
        <section>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <a href="{{ route('kelola-gejala.create') }}" class="btn btn-primary mb-3">Tambah Gejala Baru</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gejala</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gejalaList as $gejala)
                        <tr>
                            <td>{{ $gejala->id }}</td>
                            <td>{{ $gejala->symptom }}</td>
                            <td>
                                <a href="{{ route('kelola-gejala.edit', $gejala->id) }}" class="btn btn-warning"><i
                                        class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('kelola-gejala.destroy', $gejala->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus gejala ini?')">
                                        <i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </section>
    </div>
@endsection
