<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">Detail Supplier</h2>
    </x-slot>
    <div class="py-6 sm:ml-64">
        <div class="p-4 max-w-lg bg-white dark:bg-gray-800 rounded-lg shadow">
            <div class="mb-4 text-gray-800 dark:text-gray-100"><span class="font-semibold">Nama:</span>
                {{ $supplier->name }}</div>
            <div class="mb-4 text-gray-800 dark:text-gray-100"><span class="font-semibold">Alamat:</span>
                {{ $supplier->address }}</div>
            <div class="mb-4 text-gray-800 dark:text-gray-100"><span class="font-semibold">Telepon:</span>
                {{ $supplier->phone }}</div>
            <a href="{{ route('supplier.index') }}"
                class="w-full block text-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Kembali</a>
        </div>
    </div>
</x-app-layout>
