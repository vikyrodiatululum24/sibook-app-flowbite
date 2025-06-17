<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex justify-between items-center">
            <h2 class="font-semibold text-xl mb-4 text-gray-800 leading-tight dark:text-white">
                {{ __('Daftar Customer') }}
            </h2>
            <a href="{{ route('customer.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </span>
                Tambah
            </a>
        </div>
    </x-slot>
    <div class="p-4 sm:ml-64">
        <div class="overflow-x-auto">
            <table id="search-table" class="min-w-full bg-white dark:bg-gray-800 rounded shadow">
                <thead>
                    <tr>
                        <th><span class="flex items-center">Nama</span></th>
                        <th><span class="flex items-center">Alamat</span></th>
                        <th><span class="flex items-center">Telepon</span></th>
                        <th><span class="flex items-center">Action</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $customer->name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td class="flex gap-2">
                                <a href="{{ route('customer.show', $customer->id) }}" class="text-blue-600"
                                    title="Lihat">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0c0 5-9 9-9 9s-9-4-9-9a9 9 0 0118 0z" />
                                    </svg>
                                </a>
                                <a href="{{ route('customer.edit', $customer->id) }}" class="text-yellow-600"
                                    title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5h2m2 0h2a2 2 0 012 2v2m0 2v6a2 2 0 01-2 2h-6a2 2 0 01-2-2v-6a2 2 0 012-2h2m2 0V5m0 0L7 13m0 0l-4 4m4-4l4 4" />
                                    </svg>
                                </a>
                                <form id="form-delete-{{ $customer->id }}"
                                    action="{{ route('customer.destroy', $customer->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 btn-delete" data-id="{{ $customer->id }}"
                                        title="Hapus">
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                sortable: false
            });
        }
    </script>
</x-app-layout>
