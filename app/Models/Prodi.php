<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    //

    // add fillable
    protected $fillable = [
        'id_jurusan',
        'nama'
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id');
    }
    public function matkul()
    {
        return $this->hasMany(Matkul::class, 'id_prodi', 'id');
    }
    public function kurikulum()
    {
        return $this->hasMany(Kurikulum::class, 'id_prodi', 'id');
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_prodi', 'id');
    }
    public function ruang()
    {
        return $this->hasMany(Ruang::class, 'id_prodi', 'id');
    }
}
