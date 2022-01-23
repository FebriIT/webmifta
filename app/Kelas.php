<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama', 'id_tahun'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class);
    }


    public function tugas()
    {
        return $this->belongsToMany(Tugas::class);
    }

    public function guru()
    {
        return $this->belongsToMany(Tugas::class);
    }


    public function soal()
    {
        return $this->hasMany(Soal::class);
    }






    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
}
