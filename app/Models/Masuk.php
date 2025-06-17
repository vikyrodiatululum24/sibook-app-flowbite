<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    protected $fillable = [
        'buku_id',
        'supplier_id',
        'jumlah',
        'tanggal_masuk',
        'keterangan',
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

}
