{{-- @dd($hama) --}}
@extends('layout.main')

@section('container')
<link rel="stylesheet" href="{{ asset('css/hama-style.css') }}">
<div class="container">
    <title>Sistem Pakar Hama Padi || Hama</title>
    <h2>ini halaman Hama</h2>
    <section>
        @foreach ($hama as $h)
                    <div class="card">
                        <img src="{{ asset('storage/' . $h->image) }}" alt="{{ $h->image }}">
                        <div class="card-body">
                            <h2>{{ $h->name }}</h2>
                            <ul>
                                <li>Nama Latin: {{ $h->scientific_name }}</li>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                        data-bs-target="#h-Modal-{{ $h->id }}">
                                        Detail
                                    </button>
                            </ul>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="h-Modal-{{ $h->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $h->image) }}" alt="h 1">
                                    <div class="card-body">
                                        <h2>{{ $h->name }}</h2>
                                        <ul>
                                            <li><b>Nama Latin: </b>{!! $h->scientific_name !!}</li>
                                            <li><b>Uraian: </b>{!! $h->description !!}</li>
                                            <li><b>Solusi Penanggulangan: </b>{!! $h->solution !!}</li>
                                    </div>
                                </div>
                                {{-- <div class="modal-header">
                                    <h5 class="modal-title" id="h-ModalLabel">{{ $h->name }}</h5>
                                </div>
                                <div class="modal-body">
                                    <li>Uraian: {{ $h->description }}</li>
                                    <li>Manfaat: {{ $h->benefit }}</li>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
    </section>
</div>
@endsection