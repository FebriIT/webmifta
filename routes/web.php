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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::post('/register', 'AuthController@postRegister');
Route::get('/register', 'AuthController@getRegister')->name('register');
Route::post('/', 'AuthController@postLogin');
Route::get('/', 'AuthController@getLogin')->name('login');
Route::get('/loguot', 'AuthController@logout')->name('loguot');


//route admin
Route::prefix('admin')->middleware('auth', 'checkRole:admin')->group(function () {
    //data guru admin

    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/guru', 'GuruController@index');
    Route::post('/guru/create', 'GuruController@create');
    Route::get('/guru/{id}/edit', 'GuruController@edit');
    Route::post('/guru/{id}/update', 'GuruController@update');
    Route::get('/guru/{id}/hapus', 'GuruController@hapus');
    //data siswa admin
    Route::get('/siswa/pilihtahun', 'SiswaController@pilihtahun');
    Route::get('/siswa/tahunakademik/{id}', 'SiswaController@index')->name('siswa');
    Route::post('/siswa/create', 'SiswaController@create');
    Route::get('/siswa/{id}/edit', 'SiswaController@edit');
    Route::post('/siswa/{id}/update', 'SiswaController@update');
    Route::get('/siswa/{id}/hapus', 'SiswaController@hapus');
    Route::get('/siswa/{id}/profile', 'SiswaController@profile');
    //data kelas admin
    Route::get('/kelas/tahunakademik/{id}', 'KelasController@index');
    Route::get('/kelas/pilihtahun', 'KelasController@pilihtahun');
    Route::post('/kelas/create', 'KelasController@create');
    Route::get('/kelas/{id}', 'KelasController@open');
    Route::get('/kelas/{id}/hapus', 'KelasController@hapus');
    //data mapel admin
    Route::get('/mapel/pilihtahun', 'MapelController@pilihtahun');
    Route::get('/mapel/tahunakademik/{id}', 'MapelController@index');
    Route::post('/mapel/create', 'MapelController@create');
    Route::get('/mapel/{id}/hapus', 'MapelController@hapus');
    Route::get('/mapel/{id}', 'MapelController@open');
    //data materi admin
    Route::get('/materi/pilihtahun', 'MateriController@pilihtahun');
    Route::get('/materi/tahunakademik/{id}', 'MateriController@index');
    Route::post('/materi/create', 'MateriController@create');
    Route::get('/materi/download/{file_materi}', 'MateriController@getDownload');
    Route::get('/materi/{id}/hapus', 'MateriController@hapus');
    Route::get('/materi/{id}/view', 'MateriController@view');

    Route::get('/pengumuman', 'PengumumanController@index');
    Route::post('/pengumuman/create', 'PengumumanController@create');
    Route::get('/pengumuman/hapus/{id}', 'PengumumanController@hapus');

    Route::post('/kelas/nilai/tambahdata', 'NilaiController@tambahdata');
    Route::get('/nilaisiswa/{id}/hapus', 'NilaiController@hapus');
    Route::get('/kelas/{id}/nilaisiswa', 'NilaiController@index');

    Route::get('/tahunakademik', 'TahunAkademikController@index');
    Route::post('/tahunakademik/create', 'TahunAkademikController@create');
    Route::get('/tahunakademik/{id}/hapus', 'TahunAkademikController@hapus');

    Route::get('/jadwalpelajaran','JadwalController@index');
    Route::post('/jadwalpelajaran/create','JadwalController@create');
    Route::get('/jadwalpelajaran/{id}/hapus','JadwalController@hapus');
});



//rote guru
Route::prefix('guru')->middleware('auth', 'checkRole:guru')->group(function () {
    //dashboard profile guru
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/profile/{id}', 'ProfileController@index');
    Route::post('/profile/{id}/simpan', 'ProfileController@simpan');
    //kelas guru
    Route::get('/kelas/tahunakademik/{id}', 'KelasController@index');
    Route::get('/kelas/pilihtahun', 'KelasController@pilihtahun');
    Route::get('/kelas/{id}', 'KelasController@open');
    Route::get('/kelas/{id}/nilaisiswa', 'NilaiController@index');
    Route::post('/kelas/nilai/tambahdata', 'KelasController@nilai');



    // Route::get('/guru/kelas/{id}/nilaisiswa','NilaiController@index');
    //matapelajaran guru
    // Route::get('/mapel', 'MapelController@index');
    // Route::post('/mapel/create', 'MapelController@create');
    // Route::get('/mapel/{id}', 'MapelController@index2');
    // Route::get('/mapel/{id}/open', 'MapelController@open');

    //materi guru

    Route::get('/materi/pilihtahun', 'MateriController@pilihtahun');
    Route::get('/materi/tahunakademik/{id}', 'MateriController@index');
    Route::post('/materi/create', 'MateriController@create');
    Route::get('/materi/download/{file_materi}', 'MateriController@getDownload');
    Route::get('/materi/{id}/hapus', 'MateriController@hapus');
    Route::get('/materi/{id}/view', 'MateriController@view');
    //kelsa tugas guru
    // Route::get('/tugas/{id}/{id2}/nilai','KelasController@nilaisiswa');

    //tugas guru
    Route::get('/tugas/pilihtahun', 'TugasController@pilihtahun');
    Route::get('/tugas/tahunakademik/{id}', 'TugasController@index');
    Route::post('/tugas/create', 'TugasController@create');
    Route::get('/tugas/{id}/hapus', 'TugasController@hapus');
    Route::get('/tugas/{id}/delete', 'TugasController@delete');
    Route::get('/tugas/{id}', 'TugasController@open');
    Route::get('/tugas/{id}/hasil', 'TugasController@hasil');
    Route::post('/tugas/{id}/edit', 'TugasController@edit');
    Route::post('/tugas/{id}/createpilihanganda', 'TugasController@createpilihanganda');
    Route::post('/tugas/{id}/createessay', 'TugasController@createesay');
    Route::get('/tugas/download/{jawaban}', 'TugasController@getDownload');
    Route::get('/tugas/{id}/view', 'TugasController@view');
    Route::get('/tugas/hasilsiswa/{id}/{tugas_id}', 'TugasController@hasilsiswa');
    Route::post('/tugas/hasilsiswa/{id}/tambah', 'TugasController@tambahnilai');
    Route::get('/tugas/hasil/{id}/hapus', 'TugasController@hapushasil');


    Route::get('/forum/{id}', 'ForumController@index');
    Route::post('/forum/create', 'ForumController@create');
    Route::get('/forum/{id}/delete', 'ForumController@delete');
    Route::post('/forum/{id}/edit', 'ForumController@edit');

    Route::get('/nilai', 'NilaiController@index');

    Route::post('/kelas/{id}/update', 'NilaiController@update');
});

//route siswa
Route::prefix('siswa')->middleware('auth', 'checkRole:siswa')->group(function () {
    //dashboard dan profile siswa
    Route::get('/dashboard/{id}', 'DashboardController@index');
    Route::get('/profile/{id}', 'ProfileController@index');
    Route::post('/profile/{id}/simpan', 'ProfileController@simpan');
    //kelas siswa
    Route::get('/kelas/tahunakademik/{id}', 'KelasController@index');
    Route::get('/kelas/{id}', 'KelasController@open');
    //materi siswa
    Route::get('/materi/pilihtahun', 'MateriController@pilihtahun');
    Route::get('/materi/tahunakademik/{id}', 'MateriController@index');
    Route::get('/materi/download/{file_materi}', 'MateriController@getDownload');
    Route::get('/materi/{id}/view', 'MateriController@view');
    Route::get('/materi/download/{file_materi}', 'MateriController@getDownload');
    //tugas siswa    
    Route::get('/tugas/{id}/takesoal', 'TugasController@takesoal');
    //soal siswa
    Route::get('/mapel/{id}', 'MapelController@open');
    Route::get('/mapel/{id}/takesoal', 'TugasController@takesoal');
    Route::get('/tugas/{id}/soal', 'TugasController@soal');
    Route::get('/tugas/{id}/soalessay', 'TugasController@soalessay');
    Route::post('/tugas/simpan', 'TugasController@simpanjawaban');
    // Route::post('/tugas/simpanessay','TugasController@simpanessay');

    Route::get('/nilai/{id}', 'NilaiController@open');

    Route::get('/forum/{id}', 'ForumController@index');
    Route::post('/forum/create', 'ForumController@create');
    Route::get('/forum/{id}/delete', 'ForumController@delete');
    Route::post('/forum/{id}/edit', 'ForumController@edit');

    Route::get('/kelas/{id}/nilaisiswa', 'NilaiController@index');
});
