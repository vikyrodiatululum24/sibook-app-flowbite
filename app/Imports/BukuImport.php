<?php

namespace App\Imports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Throwable;

class BukuImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsOnError
{
    use SkipsFailures, SkipsErrors;

    public $failedRows = [];

    public function model(array $row)
    {
        // dd($row['supplier_name']);
        // Validasi data sebelum membuat model Buk
        try {
            // Cek duplikat berdasarkan part_no
            if (Buku::where('part_no', $row['part_no'])->exists()) {
                $this->failedRows[] = [
                    'row' => $row,
                    'error' => 'Part No sudah ada di database.'
                ];
                return null;
            }
            // Cek apakah nama supplier sama dengan yang ada di tabel supplier jika ada maka ambil id-nya
            $supplier = \App\Models\Supplier::where('name', $row['supplier_name'] ?? '')->first();
            if (!$supplier) {
                $supplier = \App\Models\Supplier::create(['name' => $row['supplier_name'] ?? '']);
            }
            $row['supplier_id'] = $supplier->id;
            // Pastikan kolom yang diperlukan ada
            if (empty($row['part_no']) || empty($row['name'])) {
                $this->failedRows[] = [
                    'row' => $row,
                    'error' => 'Kolom part_no atau name kosong.'
                ];
                return null;
            }
            return new Buku([
                'inv_id'         => $row['inv_id'],
                'part_no'        => $row['part_no'],
                'name'           => $row['name'],
                'desc'           => $row['desc'] ?? null,
                'segment_name'   => $row['segment_name'] ?? null,
                'class'          => $row['kelas'] ?? null,
                'kat09a'         => $row['kat09a'] ?? null,
                'group_name'     => $row['group_name'] ?? null,
                'penerbit'       => $row['penerbit'] ?? null,
                'isbn'           => $row['isbn'] ?? null,
                'bid_studi1'     => $row['bid_studi1'] ?? null,
                'bid_studi2'     => $row['bid_studi2'] ?? null,
                'th_terbit'      => $row['th_terbit'] ?? null,
                'author'         => $row['author'] ?? null,
                'curriculum'     => $row['kurikulum'] ?? null,
                'stock'          => $row['stock'] ?? 0,
                'harga'          => $row['harga'] ?? 0,
                'supplier_id'    => $row['supplier_id'] ?? null,
                'created_at'     => now(),
            ]);
        } catch (Throwable $e) {
            $this->failedRows[] = [
                'row' => $row,
                'error' => $e->getMessage()
            ];
            return null;
        }
    }

    public function rules(): array
    {
        return [
            'part_no' => 'required|string',
            'name' => 'required|string',
            'stock' => 'nullable|integer|min:0',
            'harga' => 'nullable|numeric|min:0',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'part_no.required' => 'Kolom part_no wajib diisi.',
            'name.required' => 'Nama buku tidak boleh kosong.',
        ];
    }
}
