<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugasSiswa extends Model
{
    protected $table='siswa_tugas';
    protected $fillable=['siswa_id','tugas_id'];

   
}
