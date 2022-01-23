<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = ['tugas1', 'tugas2', 'tugas3', 'tugas4', 'tugas5', 'tugas6', 'uts', 'uas', 'mapel_id', 'siswa_id', 'author'];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
