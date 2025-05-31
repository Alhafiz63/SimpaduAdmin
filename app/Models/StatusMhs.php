<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusMhs extends Model
{
    //

    // add fillable
    protected $fillable = ['nama_status'];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
    public function kelasMhs()
    {
        return $this->hasMany(KelasMhs::class, 'id_status_mhs', 'id');
    }
}
