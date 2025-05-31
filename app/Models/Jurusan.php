<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    //

    // add fillable
    protected $fillable = [
        'nama_jurusan'
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function prodi()
    {
        return $this->hasMany(Prodi::class, 'id_jurusan', 'id');
    }
}
