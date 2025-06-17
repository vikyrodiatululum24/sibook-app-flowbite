<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    /** @use HasFactory<\Database\Factories\BukuFactory> */
    use HasFactory;
    protected $table = 'bukus';
    protected $fillable = [
        'inv_id',
        'part_no',
        'name',
        'desc',
        'segment_name',
        'class',
        'kat09a',
        'group_name',
        'penerbit',
        'isbn',
        'bid_studi1',
        'bid_studi2',
        'th_terbit',
        'author',
        'curriculum',
        'stock',
        'harga',
        'supplier_id',
    ];
    protected $casts = [
        'class' => 'integer',
        'stock' => 'integer',
        'harga' => 'decimal:2',
        'th_terbit' => 'integer',
    ];

    public function masuk()
    {
        return $this->hasMany(Masuk::class, 'buku_id', 'id');
    }

    public function keluar()
    {
        return $this->hasMany(Keluar::class, 'buku_id', 'id');
    }

    public function opname()
    {
        return $this->hasMany(Opname::class, 'buku_id', 'id');
    }

    public function returnBuku()
    {
        return $this->hasMany(ReturnBuku::class, 'buku_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
