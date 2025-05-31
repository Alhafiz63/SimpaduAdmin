<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAkd extends Model
{
    //

    // add fillable
    protected $fillable = [
        'nama',
        'tanggal_mulai',
        'tanggal_selesai',
        'status'
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
    public function kalenderAkd()
    {
        return $this->hasMany(KalenderAkd::class, 'id_tahun_akd', 'id');
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_tahun_akd', 'id');
    }
    public function kelasMhs()
    {
        return $this->hasMany(KelasMhs::class, 'id_tahun_akd', 'id');
    }
}
