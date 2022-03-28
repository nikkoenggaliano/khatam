<?php

namespace App\Http\Controllers;

use \App\Models\Surah as Surah;
use \App\Models\Quran as Quran;
use \App\Models\BacaQuran as BacaQuran;
use \App\Models\Hadits as Hadits;
use \App\Models\Favorite as Favorite;
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

        $favorites = [];

        if (Auth::check()) {
            $uid = Auth::user()->id;
            $get = Favorite::where('sumber', '=', $id)->where('uid', '=', $uid)->where('type', '=', 'surat')->get();
            if (count($get) > 0) {
                foreach ($get as $item) {
                    array_push($favorites, $item->no);
                }
            }
        }

        #print_r($favorites);
        $quick_data = DB::table('surah')->whereIn('id', $quick_links)->get();
        return view('bacasurah', ['data' => $data, 'quick_data' => $quick_data, 'favorites' => $favorites]);
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


    public function HaditsPage()
    {
        return view('haditshome', ['data' => NULL]);
    }

    public function carihadits(Request $request)
    {

        $hasil = "";
        $data = $request->hadits;
        $pecah = explode(" ", $data);
        if (count($pecah) <= 1 && strlen($pecah[0]) < 3) {
            return redirect()->route('hadits-home');
        }


        if (count($pecah) == 1 && strlen($pecah[0]) > 3) {
            $hasil = Hadits::where('arti', 'LIKE', "%{$pecah[0]}%")->limit(400)->get();
        } elseif (count($pecah) > 1) {
            $hasil = Hadits::where('arti', 'LIKE', "%{$pecah[0]}%");
            array_shift($pecah);
            foreach ($pecah as $cari) {
                $hasil->orWhere('arti', 'LIKE', "%{$cari}%");
            }
            $hasil = $hasil->limit(400)->get();
        }
        return view('haditshome', ['data' => $hasil]);
    }

    public function bacahadits($rawi, $no)
    {

        $data = Hadits::where('rawi', '=', $rawi)->where('no', '=', $no)->get();
        if (count($data) < 1) {

            return redirect()->route('hadits-home');
        }

        $favorites = False;

        if (Auth::check()) {
            $uid = Auth::user()->id;
            $get = Favorite::where('sumber', '=', $rawi)->where('no', '=', $no)->where('uid', '=', $uid)->where('type', '=', 'hadits')->get();
            if (count($get) > 0) {
                $favorites = True;
            }
        }
        return view('bacahadits', ['data' => $data, 'favorites' => $favorites]);
    }

    public function pegonkan()
    {
        return view('pegon');
    }
}
