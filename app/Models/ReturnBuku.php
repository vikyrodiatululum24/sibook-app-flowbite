<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnBuku extends Model
{
  protected $fillable = [
    'buku_id',
    'customer_id',
    'tanggal_return',
    'jumlah',
    'keterangan',
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
