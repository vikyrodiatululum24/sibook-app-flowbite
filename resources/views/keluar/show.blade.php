<x-app-layout>
    <x-slot name="header">
        <div class="flex mx-auto justify-center items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
                {{ __('Detail Buku Keluar') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 sm:ml-64">
        <div class="p-4 flex-col max-w-xl mx-auto bg-white dark:bg-gray-800 rounded shadow">
            <div class="mb-4">
                <span class="block text-gray-500 dark:text-gray-300 text-sm">Nama Buku</span>
                <span class="font-semibold text-gray-900 dark:text-white">{{ $keluar->buku->name ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-gray-500 dark:text-gray-300 text-sm">Customer</span>
                <span class="font-semibold text-gray-900 dark:text-white">{{ $keluar->customer->name ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-gray-500 dark:text-gray-300 text-sm">Jumlah</span>
                <span class="font-semibold text-gray-900 dark:text-white">{{ $keluar->jumlah }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-gray-500 dark:text-gray-300 text-sm">Tanggal Keluar</span>
                <span class="font-semibold text-gray-900 dark:text-white">{{ $keluar->tanggal_keluar }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-gray-500 dark:text-gray-300 text-sm">Status</span>
                <span class="font-semibold text-gray-900 dark:text-white">{{ $keluar->status }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-gray-500 dark:text-gray-300 text-sm">Keterangan</span>
                <span class="font-semibold text-gray-900 dark:text-white">{{ $keluar->keterangan ?? '-' }}</span>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('keluar.index') }}"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</a>
            </div>
        </div>
</x-app-layout>
