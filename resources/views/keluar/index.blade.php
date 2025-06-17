<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex justify-between items-center">
            <h2 class="font-semibold text-xl mb-4 text-gray-800 leading-tight dark:text-white">
                {{ __('Buku Keluar') }}
            </h2>
            <div class="flex gap-4 items-center ml-auto">
                <a href="{{ route('keluar.scan') }}"
                    class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-200 active:bg-green-600 transition mr-2">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <rect x="3" y="3" width="7" height="7" rx="2" stroke="currentColor"
                                stroke-width="2" fill="none" />
                            <rect x="14" y="3" width="7" height="7" rx="2" stroke="currentColor"
                                stroke-width="2" fill="none" />
                            <rect x="14" y="14" width="7" height="7" rx="2" stroke="currentColor"
                                stroke-width="2" fill="none" />
                            <rect x="3" y="14" width="7" height="7" rx="2" stroke="currentColor"
                                stroke-width="2" fill="none" />
                            <path d="M8 12h8" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </span>
                    Scan
                </a>
                <a href="{{ route('keluar.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </span>
                    Tambah
                </a>
            </div>
        </div>
    </x-slot>


    <div class="p-4 sm:ml-64">
        <table id="search-table">
            <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            Buku
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Supplier
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Jumlah
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Tanggal keluar
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Keterangan
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Action
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keluars as $keluar)
                    <tr>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $keluar->buku->name ?? '-' }}
                        </td>
                        <td>
                            {{ $keluar->customer->name ?? '-' }}
                        </td>
                        <td>
                            {{ $keluar->jumlah }}
                        </td>
                        <td>
                            {{ $keluar->tanggal_keluar }}
                        </td>
                        <td>
                            {{ $keluar->keterangan }}
                        </td>
                        <td>
                            <a href="{{ route('keluar.show', $keluar->id) }}"
                                class="text-blue-600 hover:text-blue-800 mr-2" title="View">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <a href="{{ route('keluar.edit', $keluar->id) }}"
                                class="text-yellow-500 hover:text-yellow-700 mr-2" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5h2m2 0h2a2 2 0 012 2v2m0 2v2m0 2v2a2 2 0 01-2 2h-2m-2 0h-2a2 2 0 01-2-2v-2m0-2v-2m0-2V7a2 2 0 012-2h2" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536M9 13l6-6 3 3-6 6H9v-3z" />
                                </svg>
                            </a>
                            <form action="{{ route('keluar.destroy', $keluar->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
<script>
    if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#search-table", {
            searchable: true,
            sortable: false
        });
    }

    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data akan hilang secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-delete-' + id).submit();
                }
            });
        });
    });
</script>
