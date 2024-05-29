@extends('template.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-2">Data Barang</h1>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    New Data
                </button>
                <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">New Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <form method="POST" action="{{ route('dashboard.barang.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col mb-3">
                                            <label for="namaBarang" class="form-label">Nama </label>
                                            <input type="text" id="namaBarang" class="form-control" name="nama">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="hargaBarang" class="form-label">Harga </label>
                                            <input type="number" min="0" id="hargaBarang" class="form-control"
                                                name="harga">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="stokBarang" class="form-label">Stok </label>
                                            <input type="number" min="0" id="stokBarang" class="form-control"
                                                name="stok">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="deskripsiBarang" class="form-label">Deskripsi </label>
                                            <input type="text" id="deskripsiBarang" class="form-control"
                                                name="deskripsi">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="gambarBarang" class="form-label">Gambar </label>
                                            <input type="file" id="gambarBarang" class="form-control" name="gambar">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="slugBarang" class="form-label">Slug </label>
                                            <input type="text" id="slugBarang" class="form-control" name="slug">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="kategoriBarang" class="form-label">Kategori </label>
                                            <input type="text" id="kategoriBarang" class="form-control" name="kategori">
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th>Gambar</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($barangs as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>
                                            <strong>{{ $data->nama }}</strong>
                                        </td>
                                        <td>{{ $data->deskripsi }}</td>
                                        <td>{{ $data->stok }}</td>
                                        <td>{{ $data->harga }}</td>
                                        <td>{{ $data->kategori }}</td>
                                        <td>
                                            <img src="{{ asset('storage/images/' . $data->gambar) }}"
                                                alt="{{ $data->nama }}" style="width: 100px">
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item"
                                                        href="{{ route('dashboard.barang.edit', $data->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>

                                                    <form action="{{ route('dashboard.barang.destroy', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item"><i
                                                                class="bx bx-trash me-1"></i> Delete</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
