<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respon extends Model
{
    protected $table = 'respon';

    protected $guarded;

    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'id_pengaduan');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
