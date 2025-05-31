<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasMK extends Model
{
    //

    // add fillable
    protected $fillable = [
        'id_kelas',
        'id_kurikulum',
        'id_ruang'
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class, 'id_kurikulum', 'id');
    }
    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang', 'id');
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_kelas_mk', 'id');
    }
    public function presensiDsn()
    {
        return $this->hasMany(PresensiDsn::class, 'id_kelas_mk', 'id');
    }
}