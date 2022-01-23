<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nisn', 'nama', 'agama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'avatar', 'user_id', 'kelas_id', 'id_tahun'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.jpg');
        }
        return asset('images/' . $this->avatar);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function guru()
    {
        return $this->belongsToMany(Guru::class);
    }
    public function soaljawaban()
    {
        return $this->hasMany(SoalJawaban::class);
    }
    public function soalessay_jawaban()
    {
        return $this->hasMany(SoalEssayJawaban::class);
    }
    public function tugas()
    {
        return $this->belongsToMany(Tugas::class)->withPivot(['its_done']);
    }
    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['id']);
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
