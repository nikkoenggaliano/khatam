<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use \App\Models\BacaQuran as BacaQuran;
use \App\Models\Surah as Surah;
use \App\Models\Quran as Quran;
use \App\Models\Favorite as Favorite;

class ApiPublicController extends Controller
{
    public function api_bacaquran(Request $request)
    {
        $no_surat = $request->surat;
        $no_ayat = $request->ayat;
        $user_id = Auth::user()->id;
        $status = 1;

        $cek_log_exist = BacaQuran::where('surat_id', '=', $no_surat)
            ->where('ayat_id', '=', $no_ayat)
            ->where('user_id', '=', $user_id)
            ->where('status', '=', $status)
            ->get();

        if (count($cek_log_exist) == 0) {
            //insert
            $logs_insert = [
                'surat_id' =>  $no_surat,
                'ayat_id' => $no_ayat,
                'user_id' => $user_id,
                'status' => $status,
            ];

            BacaQuran::Create($logs_insert);
        }

        $cek_max_ayat = Surah::find($no_surat)->jumlah_ayat;
        if ($no_ayat == $cek_max_ayat) {
            $surat_id = $no_surat + 1;
            $ayat_id  = 1;
        } else {
            $surat_id = $no_surat;
            $ayat_id = $no_ayat + 1;
        }
        $data = DB::table('quran_id as q')
            ->join('surah as s', 's.id', '=', 'q.surat_id')
            ->select('s.nama_surah', 's.arti as surah_arti', 'q.surat_id', 'q.ayat_id', 'q.arab', 'q.arti', 'q.bacaan')
            ->where('q.surat_id', '=', $surat_id)
            ->where('q.ayat_id', '=', $ayat_id)
            ->get();

        return $data;
    }


    public function api_fav(Request $request)
    {
        $allowed = ['surat', 'hadits'];
        $data = $request->data;
        $pecah = explode('-', $data); //sumber - no - type

        if (count($pecah) != 3) {

            return 'Nono';
        }


        if (!in_array($pecah[2], $allowed)) {
            return 'Not Allowed';
        }


        $is_exist = Favorite::where('sumber', '=', $pecah[0])->where('no', '=', $pecah[1])->where('type', '=', $pecah[2])->get();
        return $is_exist;

        return 'ok';
    }
}
