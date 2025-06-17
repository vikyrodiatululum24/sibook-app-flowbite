<?php

namespace App\Imports;

use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SupplierImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    public function model(array $row)
    {
        $name = trim($row['name']);
        // Skip jika nama sudah ada di database
        if (Supplier::whereRaw('LOWER(name) = ?', [strtolower($name)])->exists()) {
            return null;
        }
        return new Supplier([
            'name' => $name,
            'address' => $row['address'] ?? null,
            'phone' => $row['phone'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'name.required' => 'Nama supplier harus diisi.',
            'name.string' => 'Nama supplier harus berupa string.',
            'name.max' => 'Nama supplier tidak boleh lebih dari 255 karakter.',
            'address.string' => 'Alamat harus berupa string.',
            'address.max' => 'Alamat tidak boleh lebih dari 255 karakter.',
            'phone.string' => 'Nomor telepon harus berupa string.',
            'phone.max' => 'Nomor telepon tidak boleh lebih dari 20 karakter.',
        ];
    }
}