<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Detail Opname Stok') }}
        </h2>
    </x-slot>
    <div class="p-6 sm:ml-64">
        <div class="p-4 bg-white dark:bg-gray-800 rounded shadow max-w-lg ">
            <div class="mb-4">
                <span class="block text-gray-500 dark:text-gray-300 text-sm">Nama Buku</span>
                <span class="font-semibold text-gray-900 dark:text-white">{{ $opname->buku->name ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-gray-500 dark:text-gray-300 text-sm">Stok Sistem</span>
                <span class="font-semibold text-gray-900 dark:text-white">{{ $opname->stock_system }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-gray-500 dark:text-gray-300 text-sm">Stok Fisik</span>
                <span class="font-semibold text-gray-900 dark:text-white">{{ $opname->stock_opname }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-gray-500 dark:text-gray-300 text-sm">Selisih</span>
                <span class="font-semibold text-gray-900 dark:text-white">{{ $opname->selisih }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-gray-500 dark:text-gray-300 text-sm">Tanggal Opname</span>
                <span class="font-semibold text-gray-900 dark:text-white">{{ $opname->tanggal_opname }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-gray-500 dark:text-gray-300 text-sm mb-2">Keterangan</span>
                @php
                    $bgColor = match($opname->keterangan) {
                        'Lebih' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                        'Kurang' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
                        'Sesuai' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
                        default => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200',
                    };
                @endphp
                <span class="font-semibold px-2 py-1 rounded {{ $bgColor }}">
                    {{ $opname->keterangan ?? '-' }}
                </span>
            </div>
        </div>
    </div>
</x-app-layout>
