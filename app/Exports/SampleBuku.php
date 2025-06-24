<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class SampleBuku implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect([
            [
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
            'supplier_name',
            ],
            [
            'INV001',
            'PN12345',
            'Pemrograman PHP',
            'Buku panduan lengkap pemrograman PHP',
            'Teknologi',
            'A',
            'KAT01',
            'Komputer',
            'Penerbit Informatika',
            '978-602-1234-56-7',
            'Informatika',
            'Teknik Komputer',
            2023,
            'Budi Santoso',
            '2022',
            10,
            85000,
            'TigaSerangkai PustakaMandiri PT.',
            ],
            [
            'INV002',
            'PN67890',
            'Dasar-dasar Algoritma',
            'Pengantar algoritma untuk pemula',
            'Pendidikan',
            'B',
            'KAT02',
            'Matematika',
            'Penerbit Edukasi',
            '978-602-9876-54-3',
            'Matematika',
            'Ilmu Komputer',
            2022,
            'Siti Aminah',
            '2021',
            5,
            65000,
            'TigaSerangkai PustakaMandiri PT.',
            ],
        ]);
    }
}
