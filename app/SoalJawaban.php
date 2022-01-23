<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalJawaban extends Model
{
    protected $table='soal_jawaban';
    protected $fillable=['tugas_id','siswa_id','mapel_id','soal_id','jawaban','status',];

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    

}
