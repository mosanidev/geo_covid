<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $read_data_individu = DB::select('select * from data_individu', [1]);
        $read_data_lokasi_karantina = DB::select('select * from lokasi_karantina', [1]);
        $read_data_master_kabupaten = DB::select('select * from master_kabupaten', [1]);

        // dd($read_data_individu);
        return view('home')
                ->with('data_individu', $read_data_individu)
                ->with('lokasi_karantina', $read_data_lokasi_karantina)
                ->with('master_kabupaten', $read_data_master_kabupaten);
    }
}
