@extends('layout.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/hama/index-style.css') }}">
    <div class="container">
        <title>Sistem Pakar Hama Padi</title>
        <h2>ini halaman kelola data hama</h2>
        <section>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <a href="{{ route('kelola-hama.create') }}" class="btn btn-primary mb-3">Tambah Hama Baru</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Hama</th>
                        <th>Nama Latin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hamaList as $hama)
                        <tr>
                            <td>{{ $hama->id }}</td>
                            <td>{{ $hama->name }}</td>
                            <td>{{ $hama->scientific_name }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#h-Modal-{{ $hama->id }}">
                                    <i class="bi bi-eye"></i></button>
                                    <a href="{{ route('kelola-hama.edit', $hama->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('kelola-hama.destroy', $hama->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus gejala ini?')">
                                            <i class="bi bi-trash"></i></button>
                                    </form>
                            </td>
                        </tr>
                        <!-- Modal -->
                    <div class="modal fade" id="h-Modal-{{ $hama->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $hama->image) }}" alt="h 1">
                                    <div class="card-body">
                                        <h2>{{ $hama->name }}</h2>
                                        <ul>
                                            <li><b>Nama Latin: </b>{!! $hama->scientific_name !!}</li>
                                            <li><b>Uraian: </b>{!! $hama->description !!}</li>
                                            <li><b>Solusi Penanggulangan: </b>{!! $hama->solution !!}</li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal Detail Hama -->
            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">Detail Hama</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="detailContent"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    </section>
    </div>
@endsection
