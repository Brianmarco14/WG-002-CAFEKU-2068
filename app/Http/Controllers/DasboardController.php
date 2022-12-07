<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DasboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //MENAMPILKAN HALAMAN DASBOARD
        return view('dasboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //MENERIMA REQUEST DARI HALAMAN DASBOARD DAN MENGOLAH DATA UNTUK DIKIRIM KEMBALI KE HALAMAN DASBOARD
        //DEKLARASI NAMA DAN STATUS
        $nama = $request->nama;
        $status = $request->status;

        //PERHITUNGAN JUMLAH PESANAN
        $pesan = explode(',', $request->pesan);
        $jumlah = count($pesan);

        //PERHITUNGAN TOTAL PESANAN
        $total = $jumlah * 50000;

        //PERHITUNGAN DISKON DAN PEMBAYARAN
        $perhitungan = new perhitunganPembayaran($status, $total);
        $hasil = [
            'nama'=>$nama,
            'pesan'=>$jumlah,
            'tpesanan'=>$total,
            'status'=>$status,
            'diskon'=>$perhitungan->diskon(),
            'total'=>$perhitungan->hitungTotalPembayaran(),
        ];

        return view('dasboard', compact('hasil'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}

//INTERFACE UNTUK MENGHITUNG DISKON
interface hitung
{
    public function diskon();
}

//PERHITUNGAN DISKON IMPLEMENTS DARI INTERFACES
class perhitunganDiskon implements hitung
{
    public function __construct($status, $total)
    {
        $this->status = $status;
        $this->total = $total;
    }
    public function diskon()
    {
        if ($this->status == "member" && $this->total >= 100000) {
            return $this->total * 0.2;
        } else if ($this->status == "member" && $this->total < 100000) {
            return $this->total * 0.1;
        } else {
            return $this->total * 0;
        }
    }
}


//PERHITUNGAN TOTAL PEMBAYARAN
class perhitunganPembayaran extends perhitunganDiskon
{
    public function hitungTotalPembayaran()
    {
        return (int)$this->total - (int)$this->diskon();
    }
}
