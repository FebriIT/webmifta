<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    protected $table='jadwalpelajaran';
    protected $fillable=['guru_id','kelas_id','mapel','hari','jadwal_mulai','jadwal_selesai'];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
