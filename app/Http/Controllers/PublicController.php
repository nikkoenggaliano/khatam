<?php

namespace App\Http\Controllers;

use \App\Models\Surah as Surah;
use \App\Models\Quran as Quran;
use \App\Models\BacaQuran as BacaQuran;
use \App\Models\Hadits as Hadits;
use Illuminate\Http\Request;

use DB;
use Auth;

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

    public function Dashboard()
    {
        $user_id = Auth::user()->id;

        $how_many_today =  count(BacaQuran::where('created_at', '>=', date('Y-m-d') . ' 00:00:00')->where('user_id', $user_id)->get());
        $total_readed = count(BacaQuran::where('user_id', $user_id)->get());
        $hadits = Hadits::inRandomOrder()->limit(1)->get();
        $quran = DB::table('quran_id as q')
            ->join('surah as s', 's.id', '=', 'q.surat_id')
            ->select('s.nama_surah', 's.arti as surah_arti', 'q.surat_id', 'q.ayat_id', 'q.arab', 'q.arti', 'q.bacaan')
            ->inRandomOrder()
            ->limit(1)
            ->get();

        #dd($hadits);

        return view('dashboard', ['hari_ini' => $how_many_today, 'semua_dibaca' => $total_readed, 'hadits' => $hadits, 'quran' => $quran]);
    }
}
#