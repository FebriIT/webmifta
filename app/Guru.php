<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = ['nip', 'mapel', 'nama', 'no_hp', 'jenis_kelamin', 'tanggal_lahir', 'status', 'pendidikan', 'user_id'];
    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.jpg');
        }
        return asset('images/' . $this->avatar);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function siswa()
    {
        return $this->belongsToMany(Siswa::class);
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class);
    }
}
