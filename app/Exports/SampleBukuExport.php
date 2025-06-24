<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SampleBukuExport implements FromArray, WithHeadings
{
    public function array(): array
    {
        return [
            [
                '1234',
                'PN-12345',
                'Laravel Dasar',
                'Buku panduan pemrograman Laravel untuk pemula',
                'Teknologi Informasi',
                'A',
                'KAT09A-01',
                'Pemrograman',
                'Penerbit Maju',
                '978-602-1234-567-8',
                'Teknik Informatika',
                'Sistem Informasi',
                '2023',
                'John Doe',
                'Kurikulum 2013',
                10,
                15000,
                'PT. Buku Jaya'
            ],
        ];
    }

    public function headings(): array
    {
        return [
            'inv_id',
            'part_no',
            'name',
            'desc',
            'segment_name',
            'kelas',
            'kat09a',
            'group_name',
            'penerbit',
            'isbn',
            'bid_studi1',
            'bid_studi2',
            'th_terbit',
            'author',
            'kurikulum',
            'stock',
            'harga',
            'supplier_name',
        ];
    }
}
