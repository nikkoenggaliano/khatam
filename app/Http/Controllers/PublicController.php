<?php

namespace App\Http\Controllers;

use \App\Models\Surah as Surah;
use \App\Models\Quran as Quran;
use Illuminate\Http\Request;

use DB;

class PublicController extends Controller
{

    public function public()
    {

        $datas = Surah::all();
        return view('index', ['data' => $datas]);
    }


    public function BacaSurah($id)
    {


        if ($id > 114) {
            return redirect()->route('public');
        }

        $data = DB::table('quran_id as q')
            ->join('surah as s', 's.id', '=', 'q.surat_id')
            ->select('s.nama_surah', 's.arti as surah_arti', 'q.surat_id', 'q.ayat_id', 'q.arab', 'q.arti', 'q.bacaan')
            ->where('q.surat_id', '=', $id)
            ->get();


        $quick_links = array(

            36, 56, 67, 18, 55, 2, 114, 28, 22

        );

        $quick_data = DB::table('surah')->whereIn('id', $quick_links)->get();
        return view('bacasurah', ['data' => $data, 'quick_data' => $quick_data]);
    }
}
