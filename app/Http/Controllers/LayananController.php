<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Layanan;
use App\Models\Salon;
use DB;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "Data Layanan Salon";
        $datajoin = DB::table('tb_layanan')
                ->select(DB::raw('count(*) as jmlh_layanan,tb_salon.nama_salon, tb_salon.id_salon'))
                ->join('tb_salon', 'tb_salon.id_salon', '=', 'tb_layanan.id_salon')
                ->groupBy('tb_salon.nama_salon')
                ->groupBy('tb_salon.id_salon')
                ->get();
        $data = DB::table('tb_layanan')
                ->join('tb_salon', 'tb_salon.id_salon', '=', 'tb_layanan.id_salon')
                ->select('*')
                ->get();
        $salon = Salon::all();
        return view('layanan.index', ['data'=>$data, 'salon' => $salon , 'judul'=>$judul, 'join'=>$datajoin]);
    }

    public function tambahSalon($id)
    {
        $salon = DB::table('tb_salon')->where('id_salon', $id)->first();
        $judul = 'Tambah Layanan Salon';
        return view('salon.tambahSalon',['data'=>$salon, 'judul'=>$judul]);
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
        Layanan::create($request->all());

        return redirect('layanan')->with('pesan','data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('tb_layanan')
        ->join('tb_salon', 'tb_salon.id_salon', '=', 'tb_layanan.id_salon')
        ->select('*')
        ->where('tb_layanan.id_salon',$id)
        ->get();
        $nama = DB::table('tb_layanan')
        ->join('tb_salon', 'tb_salon.id_salon', '=', 'tb_layanan.id_salon')
        ->select('tb_salon.nama_salon')
        ->where('tb_layanan.id_salon',$id)
        ->first();
        $salon = Salon::all();
        return view('layanan.info',['data'=>$data, 'salon'=>$salon, 'nama'=>$nama]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('tb_layanan')
        ->join('tb_salon', 'tb_salon.id_salon', '=', 'tb_layanan.id_salon')
        ->select('*')
        ->where('tb_layanan.id_layanan',$id)
        ->first();
        $salon = Salon::all();
        return view('layanan.ubah',['data'=>$data,'salon'=>$salon]);
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
        Layanan::where('id_layanan', $id)
        ->update([
            'nama_layanan' => $request->nama_layanan,
            'harga' => $request->harga,
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
        DB::table('tb_layanan')->where('id_layanan', '=', $id)->delete();

        return redirect('layanan')->with('pesan',"Barang Berhasil Dihapus");
    }
}
