<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = ['nama', 'id_tahun'];



    public function kelas()
    {
        return $this->belongsToMany(Kelas::class);
    }

    public function guru()
    {
        return $this->hasMany(Guru::class);
    }
    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['id']);
    }
    public function soaljawaban()
    {
        return $this->hasMany(SoalJawaban::class);
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
