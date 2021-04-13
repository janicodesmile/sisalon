<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Salon;
use DB;

class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "Data Salon";
        $data = Salon::all();
        return view('salon.index', ['data'=>$data , 'judul'=>$judul]);
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
        Salon::create($request->all());

        return redirect('salon')->with('pesan','data berhasil ditambah');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salon = DB::table('tb_salon')->where('id_salon', $id)->first();
        return view('salon.edit',['data'=>$salon]);
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
        Salon::where('id_salon', $id)
        ->update([
            'nama_salon' => $request->nama_salon,
            'alamat' => $request->alamat,
            'jam_operasional' => $request->jam_operasional
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
        DB::table('tb_salon')->where('id_salon', '=', $id)->delete();
        DB::table('tb_layanan')->where('id_salon', '=', $id)->delete();

        return redirect('salon')->with('pesan',"Barang Berhasil Dihapus");
    }
}
