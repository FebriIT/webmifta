<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SoalEssayJawaban extends Model
{
    protected $table='soalessay_jawaban';
    protected $fillable=['tugas_id','siswa_id','jawaban','score'];
    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}