<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresensiMhs extends Model
{
    //

    // add fillable
    protected $fillable = [
        'id_presensi_dsn',
        'id_kelas_mhs',
        'waktu_presensi',
        'status'
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function presensiDsn()
    {
        return $this->belongsTo(PresensiDsn::class, 'id_presensi_dsn', 'id');
    }
    public function kelasMhs()
    {
        return $this->belongsTo(KelasMhs::class, 'id_kelas_mhs', 'id');
    }
}
