<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportOpname implements FromArray, WithStyles
{
    protected $reports;

    public function __construct($reports)
    {
        $this->reports = $reports;
    }

    public function array(): array
    {
        $collection = collect($this->reports);
        $total = count($collection);
        $periode = $collection->pluck('periode_opname')->first();
        // dd($periode);

        // Header
        $header = [
            ['LAPORAN OPNAME BUKU'], // Judul
            ['Tanggal Cetak:', now()->format('d-m-Y')],
            ['Jumlah Buku:', $total],
            ['Periode Opname:', $periode],
            [], // Baris kosong
            ['Laporan Opname Buku Periode ' . $periode],
            [], // Baris kosong
        ];

        // Header kolom data
        $tableHeader = [[
            'No',
            'Buku',
            'Tanggal Opname',
            'Stock System',
            'Stock Opname',
            'Selisih',
            'Keterangan',
            'Periode Opname'
        ]];

        // Data baris per baris
        $tableData = $collection->map(function ($item) {
            return [
                $item['id'], // Nomor urut
                $item->buku?->name ?? '-',
                $item['tanggal_opname'],
                $item['stock_system'],
                $item['stock_opname'],
                $item['selisih'] ?? 0,
                $item['keterangan'],
                $item['periode_opname'],
            ];
        })->toArray();
        return array_merge($header, $tableHeader, $tableData);
    }

    public function styles(Worksheet $sheet)
    {
        // Contoh: Tebalkan header tabel
        return [
            5    => ['font' => ['bold' => true]], // Baris ke-6 adalah header tabel
            'A5:H' . (5 + count($this->reports) + 1) => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'],
                    ],
                ],
            ],
        ];
    }
}
