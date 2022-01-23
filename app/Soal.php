<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table='soal';
    protected $fillable=['tugas_id','soal','a','b','c','d','kunci','gambar','tanggal','score'];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }

    public function soaljawaban()
    {
        return $this->hasMany(SoalJawaban::class);
    }
   
    
}
