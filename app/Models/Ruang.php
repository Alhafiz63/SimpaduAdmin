<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    //

    // add fillable
    protected $fillable = [
        'id_prodi',
        'nama_ruang'
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }
    public function kelasMk()
    {
        return $this->hasMany(KelasMK::class, 'id_ruang', 'id');
    }
}
