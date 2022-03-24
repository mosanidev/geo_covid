<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Individu;
use Storage;
use DB;

class IndividuController extends Controller
{
    public function insert(Request $request) 
    {
        $inserted = DB::table('data_individu')->insert(
                    [
                        'jenis' => $request->jenis, 
                        'nama' => ucwords(strtolower($request->nama)),
                        'no_ktp' => $request->no_ktp,
                        'alamat' => $request->alamat,
                        'provinsi' => $request->provinsi_poi,
                        'kabupaten_kota' => $request->kabupaten_kota_poi,
                        'keluhan_sakit' => $request->keluhan_sakit,
                        'riwayat_perjalanan' => $request->riwayat_perjalanan,
                        'lokasi_geom' => $request->lokasi_geom_poi
                    ]
        );

        $last_inserted_id = DB::getPdo()->lastInsertId();
        
        $insert_foto = DB::table('data_individu')
                        ->where('id', $last_inserted_id)
                        ->update(['foto' => $last_inserted_id."-".time().".".$request->foto->getClientOriginalExtension()]);

        IndividuController::store_foto($request, $last_inserted_id);
    }

    public function update(Request $request) 
    {
        DB::table('data_individu')
              ->where('id', $request->id)
              ->update(['jenis' => $request->jenis, 
                        'nama'=> ucwords(strtolower($request->nama)),
                        'no_ktp' => $request->no_ktp,
                        'alamat' => $request->alamat,
                        'provinsi' => $request->provinsi_poi,
                        'kabupaten_kota' => $request->kabupaten_kota_poi,
                        'foto' => $request->id."-".time().".".$request->foto->getClientOriginalExtension(),
                        'keluhan_sakit' => $request->keluhan_sakit,
                        'riwayat_perjalanan' => $request->riwayat_perjalanan,
                        'lokasi_geom' => $request->lokasi_geom_poi
                        ]);

        IndividuController::store_foto($request, null);
    }

    public function hapus(Request $request)
    {
        DB::table('data_individu')->where('id', $request->id)->delete();
    }

    public function store_foto(Request $request, $last_inserted_id)
    {                    
        $fotoNameBaru = "";

        if ($last_inserted_id == null)
        {
            $fotoName = $request->foto->getClientOriginalName();
            $fotoNameBaru = $request->id."-".time().".".$request->foto->getClientOriginalExtension(); 
        }
        else
        {
            $fotoName = $request->foto->getClientOriginalName();
            $fotoNameBaru = $last_inserted_id."-".time().".".$request->foto->getClientOriginalExtension(); 
        }
         
        $request->foto->storeAs('public/images', $fotoNameBaru);
    }

    public function action(Request $request) 
    {
        if ($request->btn_poi == "Tambah") {
            IndividuController::insert($request);     
            return redirect()->route('home');
        } else if ($request->btn_poi == "Ubah") {
            IndividuController::update($request);     
            return redirect()->route('home');
        } else {
            IndividuController::hapus($request);     
            return redirect()->route('home');
        }
    }

    public function view_detail($id)
    {
        $data_individu = DB::table('data_individu')
                ->where('id', $id)
                ->get();

        return view('detail', ['id'=>$data_individu[0]->id,
                                'no_ktp'=>$data_individu[0]->no_ktp,
                                'jenis'=>$data_individu[0]->jenis,
                                'nama'=>$data_individu[0]->nama,
                                'alamat'=>$data_individu[0]->alamat,
                                'provinsi'=>$data_individu[0]->provinsi,
                                'kabupaten_kota'=>$data_individu[0]->kabupaten_kota,
                                'foto'=>$data_individu[0]->foto,
                                'keluhan_sakit'=>$data_individu[0]->keluhan_sakit,
                                'riwayat_perjalanan'=>$data_individu[0]->riwayat_perjalanan,
                                'lokasi_geom'=>$data_individu[0]->lokasi_geom]);
    }
}
