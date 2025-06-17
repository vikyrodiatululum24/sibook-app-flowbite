<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
    ];

    public function masuk()
    {
        return $this->hasMany(Masuk::class);
    }

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}
