<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Carbon\Carbon;
use DB;

class KomentarController extends Controller
{
    public function read()
    {
        $all_komentar = DB::select('select * from komentar', [1]);

        return view('info', ['arr_komentar'=>$all_komentar]);
    }

    public function insert(Request $request)
    {
        $inserted = DB::table('komentar')->insert(
            [
                'waktu' => now()->toDateTimeString(), 
                'nama' => ucwords(strtolower($request->nama)),
                'email' => $request->email,
                'isi' => $request->isi
            ]
        );

        return redirect()->route('info');
    }
}
