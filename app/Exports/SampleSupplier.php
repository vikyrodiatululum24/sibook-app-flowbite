<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class SampleSupplier implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect([
            ['name', 'address', 'phone'],
            ['Contoh Supplier', 'Jl. Contoh Alamat', '08123456789'],
        ]);
    }
}
