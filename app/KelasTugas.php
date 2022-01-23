<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasTugas extends Model
{
    protected $table='kelas_tugas';
    protected $fillable=['kelas_id','tugas_id'];
}
