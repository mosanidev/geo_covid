<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LokasiKarantinaController extends Controller
{
    public function action(Request $request) 
    {
        if ($request->btn_poly == "Tambah") {
            LokasiKarantinaController::insert($request);     
            return redirect()->route('home');
        } else if ($request->btn_poly == "Ubah") {
            LokasiKarantinaController::update($request);     
            return redirect()->route('home');
        } else {
            LokasiKarantinaController::hapus($request);     
            return redirect()->route('home');
        }
    }

    public function insert(Request $request) 
    {
        $inserted = DB::table('lokasi_karantina')->insert(
            [
                'kode_provinsi' => $request->kode_provinsi, 
                'nama_provinsi' => $request->nama_provinsi,
                'kode_kabupaten' => $request->kode_kabupaten,
                'nama_kabupaten' => $request->nama_kabupaten,
                'lokasi_geom' => $request->lokasi_geom_poly
            ]
        );
    }

    public function update(Request $request)
    {
        // dd($request);
        DB::table('lokasi_karantina')
              ->where('id', $request->id_poly)
              ->update(['kode_provinsi' => $request->kode_provinsi, 
                        'nama_provinsi' => $request->nama_provinsi,
                        'kode_kabupaten' => $request->kode_kabupaten,
                        'nama_kabupaten' => $request->nama_kabupaten,
                        'lokasi_geom' => $request->lokasi_geom_poly
                        ]);
    }

    public function hapus(Request $request)
    {
        DB::table('lokasi_karantina')->where('id', $request->id_poly)->delete();
    }
}
