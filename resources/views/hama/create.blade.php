@extends('layout.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/hama/create-style.css') }}">
    <div class="container">
        <title>Sistem Pakar Hama Padi</title>
        <h2>ini halaman tambah data hama</h2>
        <section>
            <form action="{{ route('kelola-hama.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Hama</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="scientific_name">Nama Ilmiah</label>
                    <input type="text" name="scientific_name" id="scientific_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="solution" class="form-label">Solusi Penanggulangan</label>
                    <input type="hidden" class="form-control @error('solution') is-invalid @enderror" name="solution"
                        id="solution" required value="{{ old('solution') }}">
                    {{-- <trix-editor input="solution" class="bg-white"></trix-editor> --}}

                    <trix-toolbar id="trix-toolbar-1">
                        <div class="trix-button-row">
                            <span class="trix-button-group trix-button-group--block-tools"
                                data-trix-button-group="block-tools">
                                <button type="button" class="trix-button trix-button--icon trix-button--icon-bullet-list"
                                    data-trix-attribute="bullet" title="Bullets" tabindex="-1">Bullets</button>
                            </span>
                        </div>
                    </trix-toolbar>
                    <trix-editor input="solution" class="bg-white" contenteditable="" role="textbox" trix-id="1"
                        toolbar="trix-toolbar-1"></trix-editor>
                    @error('solution')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control" type="file" @error('image') is-invalid @enderror id="image"
                        name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Tambahkan input field lainnya sesuai kebutuhan -->

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </section>
    </div>
    <script>
        document.addEventListener('trix-file-accept', function() {
            e.preventDefault();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();

            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
