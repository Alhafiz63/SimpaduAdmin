<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //

    // add fillable
    protected $fillable = [
        'id',
        'id_prodi',
        'id_tahun_akd',
        'nama_kelas'
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }
    public function tahunAkd()
    {
        return $this->belongsTo(TahunAkd::class, 'id_tahun_akd', 'id');
    }
    public function kelasMhs()
    {
        return $this->hasMany(KelasMhs::class, 'id_kelas', 'id');
    }
    public function kelasMk()
    {
        return $this->hasMany(KelasMK::class, 'id_kelas', 'id');
    }
}
