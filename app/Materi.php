<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';
    protected $fillable = ['nama', 'kelas_id', 'file_materi', 'link', 'author'];

    public function getMateri()
    {

        return asset('materi/' . $this->file_materi);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
