<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuruKelas extends Model
{
    protected $table='guru_kelas';
    protected $fillable=['guru_id','kelas_id'];
}
