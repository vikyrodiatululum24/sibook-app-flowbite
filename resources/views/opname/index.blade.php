<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex justify-between items-center">
            <h2 class="font-semibold text-xl mb-4 text-gray-800 leading-tight dark:text-white">
                {{ __('Opname Buku') }}
            </h2>
            <div class="flex gap-4 items-center ml-auto">
                <a href="{{ route('opname.scan') }}"
                    class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-200 active:bg-green-600 transition mr-2">
                    <span class="mr-2">
                        <!-- SVG Scan -->
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
                <a href="{{ route('opname.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition">
                    <span class="mr-2">
                        <!-- SVG Tambah -->
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
                    <th>Tanggal Opname</th>
                    <th>Buku</th>
                    <th>Stok Sistem</th>
                    <th>Stok Opname</th>
                    <th>Selisih</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($opnames as $opname)
                    <tr>
                        <td>{{ $opname->tanggal_opname }}</td>
                        <td>{{ $opname->buku->name ?? '-' }}</td>
                        <td>{{ $opname->stock_system }}</td>
                        <td>{{ $opname->stock_opname }}</td>
                        <td>{{ $opname->selisih }}</td>
                        <td><span class="bg-{{ $opname->selisih > 0 ? 'green' : ($opname->selisih < 0 ? 'red' : 'yellow') }}-100 text-{{ $opname->selisih > 0 ? 'green' : ($opname->selisih < 0 ? 'red' : 'yellow') }}-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">{{ $opname->selisih > 0 ? 'Lebih' : ($opname->selisih < 0 ? 'Kurang' : 'Sama') }}</span></td>
                        <td class="flex gap-2">
                            <!-- View -->
                            <a href="{{ route('opname.show', $opname->id) }}" class="text-blue-500 hover:text-blue-700" title="Lihat">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0c0 5-9 9-9 9s-9-4-9-9a9 9 0 0118 0z" />
                                </svg>
                            </a>
                            <!-- Edit -->
                            <a href="{{ route('opname.edit', $opname->id) }}" class="text-yellow-500 hover:text-yellow-700" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5h2m2 0h2a2 2 0 012 2v2m0 2v6a2 2 0 01-2 2h-6a2 2 0 01-2-2v-6a2 2 0 012-2h2m2 0V5m0 0L7 13m0 0l-4 4m4-4l4 4" />
                                </svg>
                            </a>
                            <!-- Delete -->
                            <form id="form-delete-{{ $opname->id }}" action="{{ route('opname.destroy', $opname->id) }}"
                                method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="btn-delete text-red-500 px-3 py-1 rounded hover:cursor-pointer"
                                    data-id="{{ $opname->id }}">
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
