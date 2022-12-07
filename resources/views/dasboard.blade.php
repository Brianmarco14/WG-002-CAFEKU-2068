@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h2><strong>Perhitungan Order Menu</strong></h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 me-2">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <strong>Order</strong>
                                    </div>

                                    <div class="card-body">
                                        <form action="{{ url('perhitunganPesanan', []) }}" method="POST">
                                            @csrf
                                            <div class="mb-3 form-floating">
                                                <input type="text" class="form-control" name="nama">
                                                <label for="formFloatingInput">Nama</label>
                                            </div>
                                            <div class="mb-3 form-floating">
                                                <input type="text" class="form-control" name="pesan">
                                                <label for="formFloatingInput">Jumlah Pesanan</label>
                                                <small>Tambahkan tanda koma (, ) jika ingin menambah barang</small>
                                            </div>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="status" id="floatingSelect"
                                                    aria-label="Floating label select example">
                                                    <option selected disabled>Pilih Status Pelanggan Anda</option>
                                                    <option value="member">Member</option>
                                                    <option value="biasa">Bukan Member</option>
                                                </select>
                                                <label for="floatingSelect">Status</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Check</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <strong>Hasil Perhitungan</strong>
                                    </div>

                                    <div class="card-body">
                                        @isset($hasil)
                                        <table class="table mb-5">
                                            <tbody>
                                                <tr>
                                                    <th><strong>Nama</strong></th>
                                                    <td> : {{ $hasil['nama'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th><strong>Jumlah Pesanan</strong></th>
                                                    <td> : {{ $hasil['pesan'] }}Pcs</td>
                                                </tr>
                                                <tr>
                                                    <th><strong>Total Pesanan</strong></th>
                                                    <td> : Rp. {{ number_format($hasil['tpesanan'] ,0,",",".") }}</td>
                                                </tr>
                                                <tr>
                                                    <th><strong>Status</strong></th>
                                                    <td> : {{ $hasil['status'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th><strong>Diskon</strong></th>
                                                    <td> : Rp. {{ number_format($hasil['diskon'] ,0,",",".") }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="mt-5 d-flex justify-content-between">
                                            <h5><strong>Total Pembayaran </strong>:</h5>
                                            <h2><strong>
                                                 Rp. {{ number_format($hasil['total'] ,0,",",".") }}
                                            </strong></h2>
                                        </div>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
