<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';
    protected $fillable = [ 'mapel_id', 'waktu', 'pembuat', 'jenis_tugas', 'tugas_id', 'kelas_id', 'its_done', 'id_tahun','user_id'];


    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function soal()
    {
        return $this->hasMany(Soal::class);
    }
    public function soalessay()
    {
        return $this->hasMany(SoalEssay::class);
    }
    public function soaljawaban()
    {
        return $this->hasMany(SoalJawaban::class);
    }
    public function soalessay_jawaban()
    {
        return $this->hasMany(SoalEssayJawaban::class);
    }
    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['its_done']);
    }
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class);
    }
    public function getTugas()
    {
        return asset('filetugas/' . $this->jawaban);
    }
}
