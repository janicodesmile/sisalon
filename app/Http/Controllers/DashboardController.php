<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salon;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
    	$salon = DB::table('tb_salon')->count();
    	$layanan = DB::table('tb_layanan')->count();
    	$judul = "Data Layanan Salon";
        return view('dashboard',['judul'=>$judul, 'salon'=>$salon, 'layanan'=>$layanan]);
    }
}
