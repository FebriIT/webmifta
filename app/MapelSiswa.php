<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapelSiswa extends Model
{
    protected $table='mapel_siswa';
    protected $fillable=['mapel_id','siswa_id','nilai','kettugas'];
}
