<x-app-layout>
    <div class="pt-20 p-6 sm:ml-64">
        <div class="dark:from-gray-800 dark:to-gray-900 shadow-2xl rounded-2xl p-8">
            <div class="flex items-center mb-8">
                <div class="flex-1">
                    <h1 class="text-xl sm:text-2xl font-extrabold text-blue-900 dark:text-white mb-1 flex items-center gap-2">
                        {{ $buku->name }}
                    </h1>
                    <div class="text-xs text-blue-700 dark:text-blue-200 font-semibold tracking-wide">INV ID: <span
                            class="font-bold">{{ $buku->inv_id }}</span></div>
                </div>

            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-3">
                    <div><span class="font-semibold text-gray-700 dark:text-gray-200">Part No:</span> <span
                            class="text-gray-900 dark:text-white">{{ $buku->part_no }}</span></div>
                    <div><span class="font-semibold text-gray-700 dark:text-gray-200">Segment Name:</span> <span
                            class="text-gray-900 dark:text-white">{{ $buku->segment_name }}</span></div>
                    <div><span class="font-semibold text-gray-700 dark:text-gray-200">Kelas:</span> <span
                            class="text-gray-900 dark:text-white">{{ $buku->class }}</span></div>
                    <div><span class="font-semibold text-gray-700 dark:text-gray-200">Kat09A:</span> <span
                            class="text-gray-900 dark:text-white">{{ $buku->kat09a }}</span></div>
                    <div><span class="font-semibold text-gray-700 dark:text-gray-200">Group Name:</span> <span
                            class="text-gray-900 dark:text-white">{{ $buku->group_name }}</span></div>
                    <div><span class="font-semibold text-gray-700 dark:text-gray-200">Penerbit:</span> <span
                            class="text-gray-900 dark:text-white">{{ $buku->penerbit }}</span></div>
                    <div><span class="font-semibold text-gray-700 dark:text-gray-200">ISBN:</span> <span
                            class="text-gray-900 dark:text-white">{{ $buku->isbn }}</span></div>
                    <div><span class="font-semibold text-gray-700 dark:text-gray-200">Supplier:</span> <span
                            class="text-gray-900 dark:text-white">{{ $buku->supplier->name }}</span></div>
                </div>
                <div class="space-y-3">
                    <div><span class="font-semibold text-gray-700 dark:text-gray-200">Bidang Studi 1:</span> <span
                            class="text-gray-900 dark:text-white">{{ $buku->bid_studi1 }}</span></div>
                    <div><span class="font-semibold text-gray-700 dark:text-gray-200">Bidang Studi 2:</span> <span
                            class="text-gray-900 dark:text-white">{{ $buku->bid_studi2 }}</span></div>
                    <div><span class="font-semibold text-gray-700 dark:text-gray-200">Tahun Terbit:</span> <span
                            class="text-gray-900 dark:text-white">{{ $buku->th_terbit }}</span></div>
                    <div><span class="font-semibold text-gray-700 dark:text-gray-200">Penulis:</span> <span
                            class="text-gray-900 dark:text-white">{{ $buku->author }}</span></div>
                    <div><span class="font-semibold text-gray-700 dark:text-gray-200">Kurikulum:</span> <span
                            class="text-gray-900 dark:text-white">{{ $buku->curriculum }}</span></div>
                    <div><span class="font-semibold text-gray-700 dark:text-gray-200">Stock:</span> <span
                            class="inline-block px-3 py-1 rounded-full bg-blue-200 text-blue-900 dark:bg-blue-900 dark:text-blue-200 font-bold">
                            {{ $buku->stock }}</span></div>
                    <div><span class="font-semibold text-gray-700 dark:text-gray-200">Harga:</span> <span
                            class="inline-block px-3 py-1 rounded-full bg-green-200 text-green-900 dark:bg-green-900 dark:text-green-200 font-bold shadow">Rp
                            {{ number_format($buku->harga, 2, ',', '.') }}</span></div>
                </div>
            </div>
            <div class="mt-10 mb-6">
                <h2 class="text-xl font-bold text-blue-800 dark:text-blue-200 mb-3 flex items-center gap-2">
                    <svg class="w-6 h-6 text-blue-400 dark:text-blue-300" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 17l4 4 4-4m0-5V3a1 1 0 00-1-1H5a1 1 0 00-1 1v16a1 1 0 001 1h3" />
                    </svg>
                    Deskripsi Buku
                </h2>
                <div
                    class="text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-lg p-4 border border-blue-100 dark:border-gray-700 shadow-inner">
                    {{ $buku->desc }}
                </div>
            </div>
            <a href="{{ route('buku.index') }}"
                class="ml-4 px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition font-semibold">Kembali</a>
                
        </div>
    </div>
</x-app-layout>
