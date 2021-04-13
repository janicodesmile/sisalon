<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
	public $timestamps = false;
    protected $fillable = ['nama_salon', 'alamat', 'jam_operasional'];


    protected $table = 'tb_salon';
}
