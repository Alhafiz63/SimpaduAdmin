<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasMhs extends Model
{
    //

    // add fillable
    protected $fillable = [
        'id_kelas',
        'id_tahun_akd',
        'no_absen',
        'nim',
        'smt',
        'id_status'
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
    public function tahunAkd()
    {
        return $this->belongsTo(TahunAkd::class, 'id_tahun_akd', 'id');
    }
    public function statusMhs()
    {
        return $this->belongsTo(StatusMhs::class, 'id_status', 'id');
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_kelas_mhs', 'id');
    }
}
