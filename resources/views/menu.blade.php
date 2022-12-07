@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h2><strong>Daftar Menu</strong></h2>
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
                                    <th>Foto</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu as $key)
                                    <tr>
                                        <td>{{ $key->id }}</td>
                                        <td>{{ $key->nama }}</td>
                                        <td><img src="{{ asset('storage/' . $key->foto) }}" width="100px" alt="">
                                        </td>
                                        <td>Rp. {{ number_format($key->harga,0,",",".") }}</td>
                                        <td>
                                            <details>
                                                <summary>Keterangan</summary>{{ $key->keterangan }}
                                            </details>
                                        </td>
                                        <td>{{ $key->kategori->Nama }}</td>
                                        <td>
                                            <form action="{{ route('menu.destroy', $key->id) }}" method="POST">
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
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('menu.update', $key->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="mb-3 form-floating">
                                                            <input type="text" class="form-control" name="nama"
                                                                value="{{ $key->nama }}">
                                                            <label for="formFloatingInput">Nama</label>
                                                        </div>
                                                        <div class="mb-3 form-floating text-center">
                                                            <img src="{{ asset('storage/' . $key->foto) }}" width="100px" alt="">
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <input type="file" class="form-control" name="foto"
                                                                value="{{ $key->foto }}">
                                                            <label for="formFloatingInput">Foto</label>
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <input type="number" class="form-control" name="harga"
                                                                value="{{ $key->harga }}">
                                                            <label for="formFloatingInput">Harga</label>
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <textarea class="form-control" name="keterangan" id="floatingTextarea2" style="height: 150px">{{ $key->keterangan }}</textarea>
                                                            <label for="floatingTextarea2">Keterangan</label>
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <select name="kategori_id" class="form-select">
                                                                <option selected disabled>Pilih Kategori</option>
                                                                @foreach ($kategori as $kt)
                                                                    <option value="{{ $kt->id }}"
                                                                        {{ $kt->id == $key->kategori_id ? 'selected' : '' }}>
                                                                        {{ $kt->Nama }}</option>
                                                                @endforeach
                                                            </select>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('menu.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" name="nama"
                            required>
                        <label for="formFloatingInput">Nama</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="file" class="form-control" name="foto"
                        required>
                        <label for="formFloatingInput">Foto</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="number" class="form-control" name="harga"
                        required>
                        <label for="formFloatingInput">Harga</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <textarea class="form-control" name="keterangan" id="floatingTextarea2" style="height: 150px" required></textarea>
                        <label for="floatingTextarea2">Keterangan</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <select name="kategori_id" class="form-select">
                            <option selected disabled>Pilih Kategori</option>
                            @foreach ($kategori as $kt)
                                <option value="{{ $kt->id }}" @selected(old('kategori_id') == $kt->id)>
                                    {{ $kt->Nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

