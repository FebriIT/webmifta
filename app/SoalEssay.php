<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalEssay extends Model
{
    protected $table='soalessay';
    protected $fillable=['pertanyaan','tugas_id','score'];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
}
