<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    //

    // add fillable
    protected $fillable = [
        'id_matkul',
        'id_prodi',
        'id_tahun_akd',
        'nama'
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul', 'id');
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }
    public function tahunAkd()
    {
        return $this->belongsTo(TahunAkd::class, 'id_tahun_akd', 'id');
    }
    public function kelasMK()
    {
        return $this->hasMany(KelasMK::class, 'id_kurikulum', 'id');
    }
}
