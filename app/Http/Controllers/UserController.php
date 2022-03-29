<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

use Auth;
use Hash;
use Validator;
use DB;

use \App\Models\Quran as Quran;
use \App\Models\Hadits as Hadits;
use \App\Models\Favorite as Favorite;

class UserController extends Controller
{


    function Register(Request $request)
    {

        $rules = array(
            'name'      => 'required',
            'username'  => 'required|unique:users|min:5|max:15|alpha_num',
            'email'     => 'required|unique:users|email',
            'password'  => 'required|confirmed|different:username|min:6|max:30'
        );

        $email = str_replace(array("%00", "  "), "", $request->email);
        $allowed_domain_email = array('gmail.com', 'yahoo.com', 'yahoo.co.id', 'umsida.ac.id');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->route('register-page')->with('error', 'Terjadi kesalahan!');
        }

        $email_domain = explode('@', $email)[1];

        if (!in_array($email_domain, $allowed_domain_email)) {
            return redirect()->route('register-page')->with('error', 'Kami hanya menerima email domain TLD umum');
        }


        $valid = Validator::make($request->post(), $rules);
        if ($valid->fails()) {
            $msg = $valid->errors()->first();
            return redirect()->route('register-page')->with('error', $msg);
        } else {

            $data_insert = [
                'name' =>  strtoupper($request->name),
                'username' => $request->username,
                'email' => $email,
                'password' => Hash::make($request->password),
            ];

            $insert = User::Create($data_insert);

            if ($insert) {
                return redirect()->route('login-page')->with('success', "Pendaftaran berhasil");
            } else {
                return redirect()->route('register-page')->with('error', "Pendaftaran gagal, hubungi admin!");
            }
        }
    }


    function Login(Request $request)
    {
        $user = filter_var($request->user, FILTER_VALIDATE_EMAIL) ? "email" : "username";
        $data = array(
            $user => $request->user,
            "password" => $request->password
        );

        if (Auth::attempt($data)) {
            return redirect()->route('user-dashboard');
        } else {
            return redirect()->route('login-page')->with('error', 'Username atau password salah!');
        }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login-page')->with('success', 'Logout Berhasil!');
    }


    public function MyFavorites($type = 'surat')
    {
        $tipe = $type;
        $uid = Auth::user()->id;
        $type = "Ayat";
        if (!isset($tipe) || $tipe == 'ayat' || $tipe == 'surat') {
            $data = DB::table('favorites as f')
                ->join('surah as s', 'f.sumber', '=', 's.id')
                ->select('f.sumber', 'f.no', 's.nama_surah', 's.arti', 'f.created_at')
                ->where('f.uid', '=', $uid)
                ->where('f.type', '=', 'surat')
                ->get();
        } else {
            DB::enableQueryLog();
            // $data = DB::table('favorites as f')
            //     ->join('hadits as h', 'f.sumber', '=', 'h.rawi')
            //     ->select('f.sumber', 'f.no', 'h.bab', 'h.rawi', 'f.created_at')
            //     ->where('f.type', '=', 'hadits')
            //     ->where('f.uid', '=', $uid)
            //     ->where('f.no', '=', 'h.no')
            //     ->get();
            $data = DB::select("select `f`.`sumber`, `f`.`no`, `h`.`bab`, `h`.`rawi`, `f`.`created_at` from `favorites` as `f` join `hadits` as `h` on `f`.`sumber` = `h`.`rawi` and f.no = h.no WHERE `f`.`uid` = ? and `f`.`type` = 'hadits';", [$uid]);
            $type = "Hadits";
        }
        return view('user.myfavorites', ['data' => $data, 'type' => $type]);
    }

    public function ReadFav($type, $sumber, $no)
    {
        $types = ['ayat', 'hadits'];
        $uid = Auth::user()->id;
        $data = "";
        if (!in_array($type, $types)) {

            return redirect()->route('myfavorites');
        }

        if ($type == 'ayat') {

            $cek_has = Favorite::where('uid', '=', $uid)->where('sumber', '=', $sumber)->where('no', '=', $no)->where('type', '=', 'surat')->get();
            if (count($cek_has) > 0) {

                $data = DB::table('quran_id as q')
                    ->join('surah as s', 's.id', '=', 'q.surat_id')
                    ->select('s.nama_surah', 's.arti as surah_arti', 'q.surat_id', 'q.ayat_id', 'q.arab', 'q.arti', 'q.bacaan')
                    ->where('q.surat_id', '=', $sumber)
                    ->where('q.ayat_id', '=', $no)
                    ->get();

                if (count($data) < 1) {
                    return redirect()->route('myfavorites');
                }
            } else {
                return redirect()->route('myfavorites');
            }
        } else {

            $cek_has = Favorite::where('uid', '=', $uid)->where('sumber', '=', $sumber)->where('no', '=', $no)->where('type', '=', 'hadits')->get();
            if (count($cek_has) > 0) {

                $data = Hadits::where('rawi', '=', $sumber)->where('no', '=', $no)->get();
                if (count($data) < 1) {

                    return redirect()->route('myfavorites');
                }
            } else {
                return redirect()->route('myfavorites');
            }
        }
        #dd($cek_has);

        return view('user.readfavorites', ['data' => $data, 'type' => $type, 'fav' => $cek_has]);
    }
}
