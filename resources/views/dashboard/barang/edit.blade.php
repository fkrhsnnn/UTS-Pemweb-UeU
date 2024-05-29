@extends('template.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1>Edit</h1>
            <form method="POST" action="{{ route('dashboard.barang.update', $barang->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="col mb-3">
                    <label for="bagianEdit" class="form-label">Nama</label>
                    <input type="text" id="bagianEdit" value="{{ $barang->nama }}" class="form-control" name="nama">
                </div>

                <div class="col mb-3">
                    <label for="hargaEdit" class="form-label">Harga</label>
                    <input type="number" min="0" id="hargaEdit" value="{{ $barang->harga }}" class="form-control"
                        name="harga">
                </div>

                <div class="col mb-3">
                    <label for="stokEdit" class="form-label">Stok</label>
                    <input type="number" min="0" id="stokEdit" value="{{ $barang->stok }}" class="form-control"
                        name="stok">
                </div>

                <div class="col mb-3">
                    <label for="deskripsiEdit" class="form-label">Deskripsi</label>
                    <input type="text" id="deskripsiEdit" value="{{ $barang->deskripsi }}" class="form-control"
                        name="deskripsi">
                </div>

                <div class="col mb-3">
                    <label for="gambarEdit" class="form-label">Gambar</label>
                    <input type="file" id="gambarEdit" class="form-control" name="gambar">
                </div>

                <div class="col mb-3">
                    <label for="slugEdit" class="form-label">Slug</label>
                    <input type="text" id="slugEdit" value="{{ $barang->slug }}" class="form-control" name="slug">

                </div>

                <div class="col mb-3">
                    <label for="kategoriEdit" class="form-label">Kategori</label>
                    <input type="text" id="kategoriEdit" value="{{ $barang->kategori }}" class="form-control"
                        name="kategori">
                </div>

                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
@endsection
