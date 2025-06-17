<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opname extends Model
{
    protected $fillable = [
        'user_id',
        'buku_id',
        'stock_system',
        'stock_opname',
        'selisih',
        'tanggal_opname',
        'keterangan',
        'periode_opname',
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
