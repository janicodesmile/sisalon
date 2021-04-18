<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
	public $timestamps = false;
    protected $fillable = ['jenis_paket', 'keterangan', 'harga', 'gambar'];

    protected $table = 'tb_paket_perawatan';
}
