<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Paket;
use App\Models\Salon;
use DB;


class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "Data Paket";
        $datajoin = DB::table('tb_paket_perawatan')
                ->select(DB::raw('count(*) as jmlh_paket,tb_salon.nama_salon, tb_salon.id_salon'))
                ->join('tb_salon', 'tb_salon.id_salon', '=', 'tb_paket_perawatan.id_salon')
                ->groupBy('tb_salon.nama_salon')
                ->groupBy('tb_salon.id_salon')
                ->get();
        $data = DB::table('tb_paket_perawatan')
                ->join('tb_salon', 'tb_salon.id_salon', '=', 'tb_paket_perawatan.id_salon')
                ->select('*')
                ->get();
        $salon = Salon::all();
        return view('paket.index', ['data'=>$data, 'salon' => $salon , 'judul'=>$judul, 'join'=>$datajoin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nm = $request->gambar;
        $namaFile = time().rand(100,999).".".$nm->getClientOriginalExtension();

            $dtUpload = new Paket;
            $dtUpload->id_salon = $request->id_salon;
            $dtUpload->jenis_paket = $request->jenis_paket;
            $dtUpload->keterangan = $request->keterangan;
            $dtUpload->harga = $request->harga;
            $dtUpload->gambar = $namaFile;

        $nm->move(public_path().'/img', $namaFile);
        $dtUpload->save();

        return redirect('paket')->with('pesan','data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('tb_paket_perawatan')
        ->join('tb_salon', 'tb_salon.id_salon', '=', 'tb_paket_perawatan.id_salon')
        ->select('*')
        ->where('tb_paket_perawatan.id_salon',$id)
        ->get();
        $nama = DB::table('tb_paket_perawatan')
        ->join('tb_salon', 'tb_salon.id_salon', '=', 'tb_paket_perawatan.id_salon')
        ->select('tb_salon.nama_salon')
        ->where('tb_paket_perawatan.id_salon',$id)
        ->first();
        $salon = Salon::all();
        return view('paket.detail',['data'=>$data, 'salon'=>$salon, 'nama'=>$nama]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('tb_paket_perawatan')
        ->join('tb_salon', 'tb_salon.id_salon', '=', 'tb_paket_perawatan.id_salon')
        ->select('*')
        ->where('tb_paket_perawatan.id',$id)
        ->first();
        $salon = Salon::all();
        return view('paket.ubah',['data'=>$data,'salon'=>$salon]);
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
        $ubah = Paket::where('id', $id)->first();
        $awal = $ubah->gambar;

        $data = [
            'id_salon' => $request['id_salon'],
            'jenis_paket' => $request['jenis_paket'],
            'keterangan' => $request['keterangan'],
            'harga' => $request['harga'],
            'gambar' => $awal,
        ];
        $request->gambar->move(public_path().'/img', $awal);
        $ubah->update($data);
        return redirect('paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Paket::findorfail($id);

        $file = public_path('img/').$hapus->gambar;
        #cek jika ada gambar
        if(file_exists($file)){
            // maka hapus file difolder
            @unlink($file);
        }

        //hapus didatabase
        $hapus->delete();
        return back();
    }
}
