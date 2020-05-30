<?php

namespace App\Http\Controllers;

use App\VisiModel;
use App\MisiModel;
use App\TentangModel;
use App\UserModel;
use App\BeritaModel;    
use App\GalleryModel;
use App\SiswaModel;
use App\GuruModel;
use App\SejarahModel;
use App\AlumniModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function test(){
        $visi = VisiModel::all();
        return response($visi);
    }

    public function homepage(){

        $berita = null;
        $berita = BeritaModel::orderBy('tanggalBerita', 'desc')->orderBy('waktuBerita', 'desc')->get()->take(3);
        $visi = VisiModel::get()->first();
        $misi = MisiModel::get()->first();
        $gallery = GalleryModel::inRandomOrder()->get()->take(9);
        $tentang = TentangModel::get()->first();
        $alumni = SiswaModel::where('statusSiswa', 'Alumni')->get()->take(3);

        $data['visi'] = $visi;
        $data['misi'] = $misi;
        $data['berita'] = $berita;
        $data['gallery'] = $gallery;
        $data['tentang'] = $tentang;
        $data['alumni'] = $alumni;

        return view('homepage', ['data' => $data]);
    }

    public function tentang(){

        $sejarah = SejarahModel::get()->first();
        $data['sejarah'] = $sejarah;
        $misi = MisiModel::get()->first();
        $data['misi'] = $misi;
        $visi = VisiModel::get()->first();
        $data['visi'] = $visi;

        return view('tentang', ['data' => $data]);
    }

    public function berita(){
        $berita = BeritaModel::orderBy('tanggalBerita', 'desc')->orderBy('waktuBerita', 'desc')->paginate(9);
        $data['berita'] = $berita;

        return view('berita', ['data' => $data]);
    }

    public function detailBerita(Request $request){
        $berita = BeritaModel::where('idBerita', $request->id)->get()->first();
        $data['berita'] = $berita;

        return view('berita-detail', ['data' => $data]);
    }

    public function siswa(){
        $siswa= SiswaModel::where('statusSiswa', 'Siswa')->paginate(9);
        $data['siswa'] = $siswa;

        return view('siswa', ['data' => $data]);
    }
    
    public function cariSiswa(Request $request){
        $siswa= SiswaModel::where('nisn', $request->nisn)->paginate(9);
        $data['siswa'] = $siswa;

        return view('siswa', ['data' => $data]);
    }

    public function siswaDetail(Request $request){
        $siswa= SiswaModel::where('idSiswa', $request->id)->get()->first();
        $data = null;

        if(!isset($siswa) || $siswa->statusSiswa == 'Alumni'){
            $error = true;
        }
        else{
            $data['siswa'] = $siswa;
        }

        return view('siswa-detail', ['data' => $data]);
    }

    public function guru(){
        $guru = GuruModel::paginate(9);
        $data['guru'] = $guru;

        return view('guru', ['data' => $data]);
    }

    public function alumni(){

        $alumni = SiswaModel::where('statusSiswa', 'Alumni')->paginate(9);
        $data['alumni'] = $alumni;
        return view('alumni', ['data' => $data]);
    }

    public function gallery(){

        $gallery = GalleryModel::orderBy('tanggalUpload', 'desc')->orderBy('waktuUpload', 'desc')->paginate(9);

        $data['gallery'] = $gallery;

        return view('galeri', ['data' => $data]);
    }

    public function login(Request $request){

        $message = array();

        if(Session::get('login')){
            return redirect('/admin/home');
        }

        if($request->method() == 'POST'){              
            $user = UserModel::where('email', $request->username)->where('password', md5($request->password))->get()->first();
            if($user == null){
                $message['success'] = true;
                $message['message'] = 'User tidak ditemukan';
            }
            else{
                // $auth_token = Str::random(40);
                // UserModel::where('email', $request->input('email'))->update(['auth_token' => $auth_token]);;
                // $cookie = Cookie::forever('auth_token', $auth_token);
                Session::put('username', $user->username);
                Session::put('email', $user->email);
                Session::put('login', TRUE);
                return redirect('/admin');
            }
        }
        return view('login', ['message' => $message]);

    }

}