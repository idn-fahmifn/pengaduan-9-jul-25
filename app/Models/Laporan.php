<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'pengaduan';
    protected $guarded;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
