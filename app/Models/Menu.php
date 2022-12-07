<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
        //MENGINISIALISASI TABLE DAN MENGATUR KOLOM YANG TIDAK BOLEH DIISI
        protected $table = 'menu';
        protected $guarded = ['id'];
    
        //FUNGSI UNTUK MENGHUBUNGKAN TABLE
        public function kategori()
        {
            return $this->belongsTo(Kategori::class);
        }
    
}
