@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h2><strong>Daftar Kategori</strong></h2>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</a>
                        </div>
                        <table class="table table-bordered p-2 text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $key)
                                    <tr>
                                        <td>{{ $key->id }}</td>
                                        <td>{{ $key->Nama }}</td>
                                        <td>
                                            <form action="{{ route('kategori.destroy', $key->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $key->id }}">Edit</a>
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah anda yakin?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit{{ $key->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('kategori.update', $key->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="mb-3 form-floating">
                                                            <input type="text" class="form-control" name="Nama"
                                                                value="{{ $key->Nama }}">
                                                            <label for="formFloatingInput">Nama Kategori</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-warning">Edit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="modal fade" id="tambah" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kategori.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" name="Nama"
                            required>
                        <label for="formFloatingInput">Nama Kategori</label>
                    </div>    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

