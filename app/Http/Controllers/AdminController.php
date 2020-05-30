<?php

namespace App\Http\Controllers;

use App\BeritaModel;
use App\GuruModel;
use App\AlumniModel;
use App\UserModel;
use App\SiswaModel;
use App\TentangModel;
use App\VisiModel;
use App\MisiModel;
use App\GalleryModel;
use App\SejarahModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function home(){

        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $berita = BeritaModel::all();
        $siswa = SiswaModel::where('statusSiswa', 'Siswa')->get();
        $guru = GuruModel::all();
        $alumni = SiswaModel::where('statusSiswa', 'Alumni')->get();

        $total = array(
            'berita' => $berita->count(),
            'siswa' => $siswa->count(),
            'guru' => $guru->count(),
            'alumni' => $alumni->count()
        );
        // return response($total['bukutamu']);

        return view('adminhome', ['data' => $total, 'login' => $user]);
    }

    public function berita(){

        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $berita = BeritaModel::orderBy('tanggalBerita', 'desc')->get();

        $data = array(
            'berita' => $berita
        );

        return view('adminBerita', ['login' => $user, 'data'=>$data]);
    }

    public function formBerita(Request $request){

        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $succes = null;
        $error = array();
        $title = 'Tambah Guru';
        $data = array(
            'success' => $succes,
            'error' => $error,
            'title' => $title
        );
        
        if($request->method() == 'GET'){
            if($request->id != null){
                $berita = BeritaModel::where('idBerita', $request->id)->get()->first();
                $data['berita'] = $berita;
                return view('adminBeritaForm', ['login' => $user, 'data'=>$data]);
            }
            else{
                return view('adminBeritaForm', ['login' => $user, 'data'=>$data]);
            }
        }

        else if($request->method() == 'POST'){

            // check dulu apakah berita sudah ada
            // kalo ada id dari data tersebut
            // kalo tidak buat baru

            $berita = null;
            $nama = null;
            if(BeritaModel::where('idBerita', $request->id)->get()->first() != null){
                $berita = BeritaModel::where('idBerita', $request->id)->get()->first();
            }
            else{
                $berita = new BeritaModel();
                $berita->idBerita = Str::random(10);
            }

            // check apakah ada gambar
            if($request->hasFile('images')){
                if(isset($berita->gambar)){
                    $image_path = public_path()."/images/berita/".$berita->gambar;  // Value is not URL but directory file path
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $file = $request->file('images');
                $nama = Str::random(21).'.jpg';
                $path = public_path().'/images/berita';
                $file->move($path, $nama);
            } else{
                if(isset($berita->gambar)){
                    $nama = $berita->gambar;
                }
            }
            
            $berita->judulBerita = $request->judulBerita;
            $berita->pembuatBerita = $request->pembuatBerita;
            $berita->waktuBerita = Carbon::now()->toTimeString();
            $berita->tanggalBerita = Carbon::now()->toDateString();
            $berita->gambar = $nama;
            $berita->isiBerita = $request->isiBerita;
            $berita->save();

            return redirect('admin/berita');
        }

        return view('adminBerita', ['login' => $user, 'data'=>$data]);
    }

    public function deleteBerita(Request $req){
        BeritaModel::where('idBerita', $req->id)->delete();
        
        return redirect('/admin/berita');
    }

    public function siswa(){
        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $siswa = SiswaModel::where('statusSiswa', 'Siswa')->get();
        $data = array(
            'siswa' => $siswa
        );

        return view('adminSiswa', ['login' => $user, 'data' => $data]);
    }

    public function siswaHapus(Request $req){
        SiswaModel::where('idSiswa', $req->id)->delete();
        
        return redirect('/admin/siswa');
    }

    public function siswaForm(Request $request){
        
        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $succes = null;
        $error = array();
        $title = 'Tambah Siswa';
        $data = array(
            'success' => $succes,
            'error' => $error,
            'title' => $title
        );
        
        if($request->method() == 'GET'){
            if($request->id != null){
                $siswa = SiswaModel::where('idSiswa', $request->id)->get()->first();
                $title = 'Edit Siswa';
                $data['siswa'] = $siswa;
                return view('adminSiswaForm', ['login' => $user, 'data'=>$data]);
            }
            else{
                return view('adminSiswaForm', ['login' => $user, 'data'=>$data]);
            }
        }

        else if($request->method() == 'POST'){
            $siswa = null;
            $nama = null;
            if(SiswaModel::where('idSiswa', $request->id)->get()->first() != null){
                $siswa = SiswaModel::where('idSiswa', $request->id)->get()->first();
            }
            else{
                $siswa = new SiswaModel();
                $siswa->idSiswa = Str::random(25);
            }

            // check apakah ada gambar
            if($request->hasFile('images')){
                if(isset($siswa->gambarPeserta)){
                    $image_path = public_path()."/images/siswa/".$siswa->gambarPeserta;  // Value is not URL but directory file path
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $file = $request->file('images');
                $nama = Str::random(21).'.jpg';
                $path = public_path().'/images/siswa';
                $file->move($path, $nama);
            } else{
                if(isset($siswa->gambarPeserta)){
                    $nama = $siswa->gambarPeserta;
                }
            }
            
            $siswa->noPeserta = $request->noPeserta;
            $siswa->nisn = $request->nisn;
            $siswa->namaPeserta = $request->nama;
            $siswa->tempatLahir = $request->tempatLahir;
            $siswa->tanggalLahir = $request->tanggalLahir;
            $siswa->kelas = $request->kelas;
            $siswa->bin = $request->bin;
            $siswa->ing = $request->ing;
            $siswa->mat = $request->mat;
            $siswa->ipa = $request->ipa;
            $siswa->jumlahNilai = $request->jumlahNilai;
            $siswa->statusLulus = $request->statusLulus;
            $siswa->gambarPeserta = $nama;
            $siswa->statusSiswa = $request->statusSiswa;
            $siswa->save();

            return redirect('admin/siswa');
        }

        return view('adminSiswaForm', ['login' => $user, 'data' => $data]);
    }

    public function alumni(){
        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $alumni = SiswaModel::where('statusSiswa', 'Alumni')->get();
        $data = array(
            'alumni' => $alumni
        );

        return view('adminAlumni', ['login' => $user, 'data' => $data]);
    }

    public function alumniHapus(Request $req){
        SiswaModel::where('idSiswa', $req->id)->delete();
        
        return redirect('/admin/alumni');
    }

    public function alumniForm(Request $request){
        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $succes = null;
        $error = array();
        $title = 'Tambah Alumni';
        $data = array(
            'success' => $succes,
            'error' => $error,
            'title' => $title
        );
        
        if($request->method() == 'GET'){
            if($request->id != null){
                $alumni = SiswaModel::where('idSiswa', $request->id)->get()->first();
                $title = 'Edit Alumni';
                $data['alumni'] = $alumni;
                return view('adminAlumniForm', ['login' => $user, 'data'=>$data]);
            }
            else{
                return view('adminAlumniForm', ['login' => $user, 'data'=>$data]);
            }
        }

        else if($request->method() == 'POST'){
            $alumni = null;
            $nama = null;
            if(SiswaModel::where('idSiswa', $request->id)->get()->first() != null){
                $alumni = SiswaModel::where('idSiswa', $request->id)->get()->first();
            }
            else{
                $alumni = new SiswaModel();
                $alumni->idSiswa = Str::random(25);
            }

            // check apakah ada gambar
            if($request->hasFile('images')){
                if(isset($alumni->gambarPeserta)){
                    $image_path = public_path()."/images/siswa/".$alumni->gambarPeserta;  // Value is not URL but directory file path
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $file = $request->file('images');
                $nama = Str::random(21).'.jpg';
                $path = public_path().'/images/siswa';
                $file->move($path, $nama);
            } else{
                if(isset($alumni->gambarPeserta)){
                    $nama = $alumni->gambarPeserta;
                }
            }
            
            $alumni->namaPeserta = $request->namaPeserta;
            $alumni->pesanAlumni = $request->pesanAlumni;
            $alumni->gambarPeserta = $nama;
            $alumni->save();

            return redirect('admin/alumni');
        }

        return view('adminAlumniForm', ['login' => $user, 'data' => $data]);
    }

    public function guru(){
        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $guru = GuruModel::all();
        $data = array(
            'guru' => $guru
        );

        return view('adminGuru', ['login' => $user, 'data' => $data]);
    }

    public function guruHapus(Request $req){
        GuruModel::where('idGuru', $req->id)->delete();
        
        return redirect('/admin/guru');
    }

    public function guruForm(Request $request){
        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $succes = null;
        $error = array();
        $title = 'Tambah Guru';
        $data = array(
            'success' => $succes,
            'error' => $error,
            'title' => $title
        );
        
        if($request->method() == 'GET'){
            if($request->id != null){
                $guru = GuruModel::where('idGuru', $request->id)->get()->first();
                $title = 'Edit Guru';
                $data['guru'] = $guru;
                return view('adminGuruForm', ['login' => $user, 'data'=>$data]);
            }
            else{
                return view('adminGuruForm', ['login' => $user, 'data'=>$data]);
            }
        }

        else if($request->method() == 'POST'){
            $guru = null;
            $nama = null;
            if(GuruModel::where('idGuru', $request->id)->get()->first() != null){
                $guru = GuruModel::where('idGuru', $request->id)->get()->first();
            }
            else{
                $guru = new GuruModel();
                $guru->idGuru = Str::random(25);
            }

            // check apakah ada gambar
            if($request->hasFile('images')){
                if(isset($siswa->gambarGuru)){
                    $image_path = public_path()."/images/guru/".$guru->gambarGuru;  // Value is not URL but directory file path
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $file = $request->file('images');
                $nama = Str::random(21).'.jpg';
                $path = public_path().'/images/guru';
                $file->move($path, $nama);
            } else{
                if(isset($guru->gambarGuru)){
                    $nama = $guru->gambarGuru;
                }
            }
            
            $guru->namaGuru = $request->namaGuru;
            $guru->tempatLahir = $request->tempatLahir;
            $guru->tanggalLahir = $request->tanggalLahir;
            $guru->nip = $request->nip;
            $guru->nuptk = $request->nuptk;
            $guru->gambarGuru = $nama;
            $guru->save();

            return redirect('admin/guru');
        }

        return view('adminGuruForm', ['login' => $user, 'data' => $data]);
    }

    public function tentang(Request $request){
        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $error = array();
        $success = null;

        if($request->method() == 'POST'){
            // Pertama ambil dulu data yang di database
            // Ambil value gambarnya, kemudian hapus gambar dari storage
            $data = TentangModel::get()->first();
            $nama = null;
            $nama1 = null;
            $nama2 = null;
            $nama3 = null;
            if(isset($data)){
                $nama = $data->gambar1;
                $nama1 = $data->gambar2;
                $nama2 = $data->gambar3;
                $nama3 = $data->gambar4;
            }
            //hapus seluruh data yang ada
            TentangModel::truncate();

            if($request->hasFile('images1')){
                $nama = Str::random(21).'.jpg';
                if(isset($data->gambar1)){
                    $image_path = public_path()."/images/tentang/".$data->gambar1;
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $file = $request->file('images1');
                $path = public_path().'/images/tentang';
                $file->move($path, $nama);
            }

            if($request->hasFile('images2')){
                $nama1 = Str::random(21).'.jpg';
                if(isset($data->gambar2)){
                    $image_path = public_path()."/images/tentang/".$data->gambar2; 
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $file = $request->file('images2');
                $path = public_path().'/images/tentang';
                $file->move($path, $nama1);
            }

            if($request->hasFile('images3')){
                $nama2 = Str::random(21).'.jpg';
                if(isset($data->gambar3)){
                    $image_path = public_path()."/images/tentang/".$data->gambar3; 
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $file = $request->file('images3');
                $path = public_path().'/images/tentang';
                $file->move($path, $nama2);
            }

            if($request->hasFile('images4')){
                $nama3 = Str::random(21).'.jpg';
                if(isset($data->gambar4)){
                    $image_path = public_path()."/images/tentang/".$data->gambar4; 
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $file = $request->file('images4');
                $path = public_path().'/images/tentang';
                $file->move($path, $nama3);
            }

            //siapkan data baru
            $data = new TentangModel();
            $data->tentang1 = $request->tentang1;
            $data->gambar1 = $nama;
            $data->tentang2 = $request->tentang2;
            $data->gambar2 = $nama1;
            $data->tentang3 = $request->tentang3;
            $data->gambar3 = $nama2;
            $data->tentang4 = $request->tentang4;
            $data->gambar4 = $nama3;
            $data->save();

        }

        $tentang = TentangModel::get()->first();

        $data = array(
            'title' => 'Edit Tentang',
            'tentang' => $tentang,
            'error' => $error,
            'success' => $success
          );

        return view('adminTentang', ['login' => $user, 'data' => $data]);
    }

    public function sejarah(Request $request){
        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $error = array();
        $success = null;
        
        if($request->method() == 'POST'){
            // Pertama ambil dulu data yang di database
            // Ambil value gambarnya, kemudian hapus gambar dari storage
            $data = SejarahModel::get()->first();
            $nama = null;
            $nama1 = null;
            if(isset($data)){
                $nama = $data->gambar1;
                $nama1 = $data->gambar2;
            }
            //hapus seluruh data yang ada
            SejarahModel::truncate();

            if($request->hasFile('images1')){
                $nama = Str::random(21).'.jpg';
                if(isset($data->gambar1)){
                    $image_path = public_path()."/images/sejarah/".$data->gambar1;
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $file = $request->file('images1');
                $path = public_path().'/images/sejarah';
                $file->move($path, $nama);
            }

            if($request->hasFile('images2')){
                $nama2 = Str::random(21).'.jpg';
                if(isset($data->gambar2)){
                    $image_path = public_path()."/images/sejarah/".$data->gambar2; 
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $file = $request->file('images2');
                $path = public_path().'/images/sejarah';
                $file->move($path, $nama2);
            }
            //siapkan data baru
            $data = new SejarahModel();
            $data->sejarah1 = $request->sejarah1;
            $data->gambar1 = $nama;
            $data->sejarah2 = $request->sejarah2;
            $data->gambar2 = $nama2;
            $data->save();
        }

        $sejarah = SejarahModel::get()->first();

        $data = array(
            'title' => 'Edit Sejarah',
            'sejarah' => $sejarah,
            'error' => $error,
            'success' => $success
          );

        return view('adminSejarah', ['login' => $user, 'data' => $data]);
    }

    public function visi(Request $request){
        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $error = array();
        $success = null;

        if($request->method() == 'POST'){

            $data = VisiModel::get()->first();
            $nama = null;
            if(isset($data)){
                $nama = $data->gambar;
            }

            VisiModel::truncate();
            

            //persiapkan nama untuk kedua gambar

            if($request->hasFile('images')){
                $nama = Str::random(21).'.jpg';
                if(isset($data->gambar)){
                    $image_path = public_path()."/images/visi/".$data->gambar;
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $file = $request->file('images');
                $path = public_path().'/images/visi';
                $file->move($path, $nama);
            }

            $data = new VisiModel();
            $data->visi = $request->visi;
            $data->gambar = $nama;
            $data->save();
        }

        $visi = VisiModel::get()->first();

        $data = array(
            'title' => 'Edit Visi',
            'visi' => $visi,
            'error' => $error,
            'success' => $success
          );

        return view('adminVisi', ['login' => $user, 'data' => $data]);
    }

    public function misi(Request $request){
        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $error = array();
        $success = null;

        if($request->method() == 'POST'){
            $data = MisiModel::get()->first();
            $nama = null;
            if(isset($data)){
                $nama = $data->gambar;
            }
            
            MisiModel::truncate();
            
            //persiapkan nama untuk kedua gambar

            if($request->hasFile('images')){
                $nama = Str::random(21).'.jpg';
                if(isset($data->gambar)){
                    $image_path = public_path()."/images/misi/".$data->gambar;
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $file = $request->file('images');
                $path = public_path().'/images/misi';
                $file->move($path, $nama);
            }

            $data = new MisiModel();
            $data->misi = $request->misi;
            $data->gambar = $nama;
            $data->save();
        }

        $misi = MisiModel::get()->first();

        $data = array(
            'title' => 'Edit misi',
            'misi' => $misi,
            'error' => $error,
            'success' => $success
          );

        return view('adminMisi', ['login' => $user, 'data' => $data]);
    }

    public function gallery(Request $request){

        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $gambar = GalleryModel::all();
        $data['gambar'] = $gambar;

        return view('adminGallery', ['login' => $user, 'data' => $data]);

    }

    public function galleryForm(Request $request){

        $user = UserModel::where('username', Session::get('username'))->get()->first();

        if($request->method() == 'POST'){
            // Pertama check apakah ada file yang di upload
            // kemudian ambil satu satu file tersebut
            // Tentukan nama gambarnya
            // Simpan ke database
            // Simpan gambarnya

            $files = $request->file('images');

            if($request->hasFile('images'))
            {
                foreach ($files as $file) {

                    $gambar = new GalleryModel;
                    $nama = Str::random(21).'.jpg';
                    $gambar->idGambar = $nama;
                    $gambar->deskripsi = $request->deskripsi;
                    $gambar->tanggalUpload = Carbon::now()->toDateString();
                    $gambar->waktuUpload = Carbon::now()->toTimeString();
                    $gambar->uploader = "Yonathan";
                    $gambar->save();

                    // $file->store('images/gallery/'.$nama);
                    // $file = $req->file('images');
                    // $name = time().'.jpg';
                    $path = public_path().'/images/gallery';
                    $file->move($path, $nama);
                }
            }

            return redirect('/admin/gallery');
        }

        return view('adminGalleryForm', ['login' => $user]);

    }

    public function galleryHapus(Request $request){
        
        GalleryModel::where('idGambar', $request->id)->delete();

        $image_path = public_path()."/images/gallery/".$request->id;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        return redirect('/admin/gallery');

    }

    public function test(){
        return response(Carbon::now()->toDateString());
    }

    public function user(){
        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $user2 = UserModel::all();
        $data['user'] = $user2;

        return view('adminUser', ['login' => $user, 'data' => $data]);
    }

    public function userForm(Request $request){
        $user = UserModel::where('username', Session::get('username'))->get()->first();
        $succes = null;
        $error = array();
        $title = 'Tambah User';
        $data = array(
            'success' => $succes,
            'error' => $error,
            'title' => $title
        );

        if($request->method() == 'GET'){
            if($request->id != null){
                $user = UserModel::where('idUser', $request->id)->get()->first();
                $title = 'Edit User';
                $data['user'] = $user;
                return view('adminUserForm', ['login' => $user, 'data'=>$data]);
            }
            else{
                return view('adminUserForm', ['login' => $user, 'data'=>$data]);
            }
        }

        else if($request->method() == 'POST'){
            $user = null;
            
            if(UserModel::where('idUser', $request->id)->get()->first() != null){
                $user = UserModel::where('idUser', $request->id)->get()->first();
            }
            else{
                $user = new UserModel();
                $user->idUser = Str::random(10);
            }

            $user->email = $request->email;
            $user->password = md5($request->password);
            $user->username = $request->username;
            $user->save();

            return redirect('admin/user');
        }

        return view('adminUserForm', ['login' => $user, 'data' => $data]);
        
    }

    public function userHapus(Request $request){
        UserModel::where('idUser', $request->id)->delete();

        return redirect('/admin/user');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('login');
    }
}