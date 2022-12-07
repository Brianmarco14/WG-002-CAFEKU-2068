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
                        <div class="row">
                            @foreach($menu as $menu)
                            <div class="col-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('storage/' . $menu->foto) }}" class="card-img-top" width="100px" alt="">
                                    <div class="card-body">
                                        <h4 class="mb-2 text-center"><strong>{{ $menu->nama }}</strong></h4>
                                        <h5 class="mb-5 text-center text-danger"><strong>Rp. {{ number_format($menu->harga,0,",",".") }}</strong></h5>
                                      <p class="card-text">{{ $menu->keterangan }}</p>
                                    </div>
                                  </div>
                            </div>
                                
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection