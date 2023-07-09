@extends('layout.main')

@section('container')
    <div class="container">
        <link rel="stylesheet" href="{{ asset('css/gejala-style.css') }}">
        <title>Sistem Pakar Hama Padi || Gejala</title>
        <h2>ini halaman gejala</h2>
        <section>
            <table class="table table-striped">
                <thead>
                    <th>NO</th>
                    <th>Gejala</th>
                </thead>
                <tbody>
                    @foreach ($gejala as $g)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $g->symptom }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
