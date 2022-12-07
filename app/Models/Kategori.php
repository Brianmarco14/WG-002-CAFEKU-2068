<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    //MENGINISIALISASI TABLE DAN MENGATUR KOLOM YANG TIDAK BOLEH DIISI
    protected $table = 'kategori';
    protected $guarded = ['id'];

    //FUNGSI UNTUK MENGHUBUNGKAN TABLE
    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
