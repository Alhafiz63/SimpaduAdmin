<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresensiDsn extends Model
{
    //

    // add fillable
    protected $fillable = [
        'pertemuan_ke',
        'id_kelas_mk',
        'tanggal',
        'waktu_presensi',
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function kelasMk()
    {
        return $this->belongsTo(KelasMK::class, 'id_kelas_mk', 'id');
    }

    public function presensiMhs()
    {
        return $this->hasMany(PresensiMhs::class, 'id_presensi_dsn', 'id');
    }
}
