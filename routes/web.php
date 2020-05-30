<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/test', 'MainController@test');

Route::get('/home', 'MainController@homepage');
Route::get('/tentang', 'MainController@tentang');
Route::get('/berita', 'MainController@berita');
Route::get('/berita/{id}', 'MainController@detailBerita');
Route::get('/siswa', 'MainController@siswa');
Route::get('/carisiswa', 'MainController@cariSiswa');
Route::get('/siswa/{id}', 'MainController@siswaDetail');
Route::post('/siswa/{id}', 'MainController@siswaDetail');
Route::get('/guru', 'MainController@guru');
Route::get('/alumni', 'MainController@alumni');
Route::get('/gallery', 'MainController@gallery');
Route::get('/login', 'MainController@login');
Route::post('/login', 'MainController@login');

Route::get('/admin', function () {
    return redirect('/admin/home');
});

Route::get('/admin/home', 'AdminController@home');
Route::get('/admin/test', 'AdminController@test');

Route::get('/admin/berita', 'AdminController@berita');
Route::get('/admin/berita/form', 'AdminController@formBerita');
Route::get('/admin/berita/form/{id}', 'AdminController@formBerita');
Route::post('/admin/berita/form', 'AdminController@formBerita');
Route::post('/admin/berita/form/{id}', 'AdminController@formBerita');
Route::get('/admin/berita/delete/{id}', 'AdminController@deleteBerita');

Route::get('/admin/guru', 'AdminController@guru');
Route::get('/admin/guru/form', 'AdminController@guruForm');
Route::post('/admin/guru/form', 'AdminController@guruForm');
Route::get('/admin/guru/form/{id}', 'AdminController@guruForm');
Route::post('/admin/guru/form/{id}', 'AdminController@guruForm');
Route::get('/admin/guru/hapus/{id}', 'AdminController@guruHapus');

Route::get('/admin/siswa', 'AdminController@siswa');
Route::get('/admin/siswa/form', 'AdminController@siswaForm');
Route::post('/admin/siswa/form', 'AdminController@siswaForm');
Route::post('/admin/siswa/form/{id}', 'AdminController@siswaForm');
Route::get('/admin/siswa/form/{id}', 'AdminController@siswaForm');
Route::get('/admin/siswa/hapus/{id}', 'AdminController@siswaHapus');

Route::get('/admin/alumni', 'AdminController@alumni');
Route::get('/admin/alumni/form', 'AdminController@alumniForm');
Route::post('/admin/alumni/form', 'AdminController@alumniForm');
Route::post('/admin/alumni/form/{id}', 'AdminController@alumniForm');
Route::get('/admin/alumni/form/{id}', 'AdminController@alumniForm');
Route::get('/admin/alumni/hapus/{id}', 'AdminController@alumnihapus');

Route::get('/admin/tentang', 'AdminController@tentang');
Route::post('/admin/tentang', 'AdminController@tentang');
Route::get('/admin/sejarah', 'AdminController@sejarah');
Route::post('/admin/sejarah', 'AdminController@sejarah');
Route::get('/admin/visi', 'AdminController@visi');
Route::post('/admin/visi', 'AdminController@visi');
Route::get('/admin/misi', 'AdminController@misi');
Route::post('/admin/misi', 'AdminController@misi');

Route::get('/admin/gallery', 'AdminController@gallery');
Route::get('/admin/gallery/form', 'AdminController@galleryForm');
Route::post('/admin/gallery/form', 'AdminController@galleryForm');
Route::get('/admin/gallery/delete/{id}', 'AdminController@galleryHapus');

Route::get('/admin/user', 'AdminController@user');
Route::get('/admin/user/form', 'AdminController@userForm');
Route::post('/admin/user/form', 'AdminController@userForm');
Route::post('/admin/user/form/{id}', 'AdminController@userForm');
Route::get('/admin/user/form/{id}', 'AdminController@userForm');
Route::get('/admin/user/hapus/{id}', 'AdminController@userHapus');

Route::get('logout', 'AdminController@logout');