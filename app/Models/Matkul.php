<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    //

    // add fillable
    protected $fillable = [
        'id_prodi',
        'nama',
        'sks',
        'semester'
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }
    public function kurikulum()
    {
        return $this->hasMany(Kurikulum::class, 'id_matkul', 'id');
    }
}
