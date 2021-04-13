<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
	public $timestamps = false;
    protected $fillable = ['nama_layanan', 'harga', 'id_salon'];


    protected $table = 'tb_layanan';
}
