<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    protected $fillable = [
        'buku_id',
        'customer_id',
        'jumlah',
        'tanggal_keluar',
        'keterangan',
        'status',
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
