<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use \App\Models\BacaQuran as BacaQuran;
use \App\Models\Surah as Surah;
use \App\Models\Quran as Quran;

class BacaQuranController extends Controller
{

    public function bacaquran()
    {

        $uid = Auth::user()->id;

        $last_surat = BacaQuran::where('user_id', '=', $uid)
            ->orderBy('created_at', "DESC")
            ->orderBy('surat_id', "DESC")
            ->orderBy('ayat_id', "DESC")
            ->get();

        if (count($last_surat) == 0) {
            $surat_id = 1;
            $ayat_id = 1;
        } else {
            $cek_max_ayat = Surah::find($last_surat[0]->surat_id)->jumlah_ayat;
            if ($last_surat[0]->ayat_id == $cek_max_ayat) {
                $surat_id = $last_surat[0]->surat_id + 1;
                $ayat_id  = 1;
            } else {
                $surat_id = $last_surat[0]->surat_id;
                $ayat_id = $last_surat[0]->ayat_id + 1;
            }
        }

        $data = DB::table('quran_id as q')
            ->join('surah as s', 's.id', '=', 'q.surat_id')
            ->select('s.nama_surah', 's.arti as surah_arti', 'q.surat_id', 'q.ayat_id', 'q.arab', 'q.arti', 'q.bacaan')
            ->where('q.surat_id', '=', $surat_id)
            ->where('q.ayat_id', '=', $ayat_id)
            ->get();

        return view('user.bacaquran', ['data' => $data]);
    }

    // public function fixingayattotal()
    // {
    //     $all_surah = Surah::all();
    //     #dd($all_surah);
    //     foreach ($all_surah as $data) {
    //         $last_ayat = Quran::where('surat_id', '=', $data['id'])->orderBy('ayat_id', "DESC")->limit(1)->get();
    //         echo $data['id'] . " -> " . $last_ayat[0]['ayat_id'] . "<br> ";
    //         Surah::where('id', '=', $data['id'])->update([
    //             'jumlah_ayat' => $last_ayat[0]['ayat_id']
    //         ]);
    //     }
    // }


}
