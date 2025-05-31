<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    //

    // add fillable
    protected $fillable = [
        'id_kelas_mk',
        'id_kelas_mhs',
        'nilai_angka',
        'nilai_huruf'
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
    public function kelasMk()
    {
        return $this->belongsTo(KelasMK::class, 'id_kelas_mk', 'id');
    }
    public function kelasMhs()
    {
        return $this->belongsTo(KelasMhs::class, 'id_kelas_mhs', 'id');
    }
}
