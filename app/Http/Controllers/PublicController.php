<?php

namespace App\Http\Controllers;
use \App\Models\Surah as Surah;
use \App\Models\Quran as Quran;
use Illuminate\Http\Request;

use DB;

class PublicController extends Controller
{

    public function public(){

        $datas = Surah::all();
        return view('index', ['data' => $datas]);

    }


    public function BacaSurah($id){


        if($id > 114){
            return redirect()->route('public');
        }

        $data = Quran::where('surat_id', $id)->get();
        #dd($data);
        return view('bacasurah', ['data' => $data]);

    }

}
