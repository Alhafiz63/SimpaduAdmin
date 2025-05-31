<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KalenderAkd extends Model
{
    //

    // add fillable
    protected $fillable = [
        'id_tahun_akd',
        'tanggal_mulai',
        'tanggal_selesai',
        'status'
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function tahunAkd()
    {
        return $this->belongsTo(TahunAkd::class, 'id_tahun_akd', 'id');
    }
}
