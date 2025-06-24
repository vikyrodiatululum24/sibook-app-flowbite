<a href="{{ route('return.show', $return->id) }}" class="text-blue-600 hover:text-blue-800 mr-2" title="View">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
    </svg>
</a>

<a href="{{ route('return.edit', $return->id) }}" class="text-yellow-500 hover:text-yellow-700 mr-2" title="Edit">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M11 5h2m2 0h2a2 2 0 012 2v2m0 2v2m0 2v2a2 2 0 01-2 2h-2m-2 0h-2a2 2 0 01-2-2v-2m0-2v-2m0-2V7a2 2 0 012-2h2" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15.232 5.232l3.536 3.536M9 13l6-6 3 3-6 6H9v-3z" />
    </svg>
</a>

<!-- Tombol open modal -->
<button data-modal-target="deleteModal-{{ $return->id }}" data-modal-toggle="deleteModal-{{ $return->id }}" class="text-red-600 hover:text-red-800 cursor-pointer">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
</button>

<!-- Modal Delete -->
<div id="deleteModal-{{ $return->id }}" tabindex="-1" class="hidden fixed z-50 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Konfirmasi Hapus</h3>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Apakah Anda yakin ingin menghapus <strong>{{ $return->buku->name }}</strong>?</p>

            <div class="flex justify-end gap-2">
                <form action="{{ route('return.destroy', $return->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>
                </form>
                <button data-modal-hide="deleteModal-{{ $return->id }}" type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Batal</button>
            </div>
        </div>
    </div>
</div>
