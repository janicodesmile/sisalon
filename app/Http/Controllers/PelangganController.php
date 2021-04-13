<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pelanggan;
use App\Models\Salon;
use DB;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "Data Pelanggan";
        $datajoin = DB::table('tb_pelanggan')
                    ->select(DB::raw('count(*) as jmlh_pelanggan,tb_salon.nama_salon, tb_salon.id_salon'))
                    ->join('tb_salon', 'tb_salon.id_salon', '=', 'tb_pelanggan.id_salon')
                    ->groupBy('tb_salon.nama_salon')
                    ->groupBy('tb_salon.id_salon')
                    ->get();
        $data = DB::table('tb_pelanggan')
                ->join('tb_salon', 'tb_salon.id_salon', '=', 'tb_pelanggan.id_salon')
                ->select('*')
                ->get();
        $salon = Salon::all();
        return view('pelanggan.index', ['data'=>$datajoin , 'judul'=>$judul, 'salon'=>$salon, 'pelanggan'=>$data]);
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
        Pelanggan::create($request->all());

        return redirect('pelanggan')->with('pesan','data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('tb_pelanggan')
        ->join('tb_salon', 'tb_salon.id_salon', '=', 'tb_pelanggan.id_salon')
        ->select('*')
        ->where('tb_pelanggan.id_salon',$id)
        ->get();
        $nama = DB::table('tb_pelanggan')
        ->join('tb_salon', 'tb_salon.id_salon', '=', 'tb_pelanggan.id_salon')
        ->select('tb_salon.nama_salon')
        ->where('tb_pelanggan.id_salon',$id)
        ->first();
        $salon = Salon::all();
        return view('pelanggan.detail',['data'=>$data, 'salon'=>$salon, 'nama'=>$nama]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('tb_pelanggan')
        ->join('tb_salon', 'tb_salon.id_salon', '=', 'tb_pelanggan.id_salon')
        ->select('*')
        ->where('tb_pelanggan.id_pelanggan',$id)
        ->first();
        $salon = Salon::all();
        return view('pelanggan.ubah',['data'=>$data,'salon'=>$salon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Pelanggan::where('id_pelanggan', $id)
        ->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_salon' => $request->id_salon
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_pelanggan')->where('id_pelanggan', '=', $id)->delete();

        return redirect('pelanggan')->with('pesan',"Pelanggan Berhasil Dihapus");
    }
}
