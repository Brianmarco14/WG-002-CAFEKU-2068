<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //MENAMPILKAN DATA MENU DAN KATEGORI PADA HALAMAN MENU
        $menu = Menu::all();
        $kategori = Kategori::all();
        return view('menu', compact('menu','kategori'));
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
        //MENAMBAH (CREATE) DATA MENU PADA HALAMAN MENU
        $file = $request->file('foto')->store('artikel/foto');
        Menu::create([
            'nama'=>$request->nama,
            'foto'=>$file,
            'harga'=>$request->harga,
            'keterangan'=>$request->keterangan,
            'kategori_id'=>$request->kategori_id,
        ]);
        return redirect('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //MENGUBAH (UPDATE) DATA MENU PADA HALAMAN MENU
        $semua = $request->all();
        try {
            $semua['foto']=$request->file('foto')->store('artikel/foto');
            $menu->update($semua);
        } catch (\Throwable $th) {
            $semua['foto']=$menu->foto;
            $menu->update($semua);
        }
        return redirect('menu');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //MENGHAPUS (DELETE) DATA MENU PADA HALAMAN MENU
        $menu->delete();
        return redirect('menu');

    }
}
