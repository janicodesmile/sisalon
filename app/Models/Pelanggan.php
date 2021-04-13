<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
	public $timestamps = false;
    protected $fillable = ['nama_pelanggan', 'email', 'alamat','no_hp','id_salon'];


    protected $table = 'tb_pelanggan';
}
