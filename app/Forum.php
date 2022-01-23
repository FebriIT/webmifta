<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table='Forum';
    protected $fillable=['judul','sluq','konten','user_id','kelas_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function Komentar(){
        return $this->hasMany(Komentar::class);
    }

}
