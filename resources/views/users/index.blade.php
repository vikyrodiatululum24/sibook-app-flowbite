<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex gap-2 justify-between items-center">
            <h2 class="font-bold text-blue-900 text-3xl mb-2 leading-tight dark:text-white">
                {{ __('Daftar Pengguna') }}
            </h2>
            <div class="flex items-center gap-4">
                <a href="{{ route('user.create') }}"
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
        </div>
    </x-slot>
    <div class="px-4 sm:ml-64">
        <div class="overflow-x-auto">
            <table id="example" class="min-w-full divide-y divide-gray-200 table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</x-app-layout>

{{-- style datatable --}}
<style>
    /* DataTable Responsive Wrapper */
    .dataTables_wrapper {
        width: 100%;
        overflow-x: hidden;
        padding: 1rem 0;
        margin: 1rem 0;
        background: transparent;
    }

    /* Table Styles */
    .dataTables_wrapper table.dataTable {
        width: 100%;
        min-width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background-color: transparent;
        font-size: 1rem;
        border-radius: 0.75rem;
        overflow: hidden;
        margin-bottom: 1.5rem;
        transition: background 0.3s;
        color: #334155;
    }

    .dark .dataTables_wrapper table.dataTable {
        color: #e5e7eb;
        background-color: transparent;
    }

    .dataTables_wrapper table.dataTable thead {
        font-size: 0.875rem;
        text-transform: uppercase;
        background-color: #f9fafb;
        color: #374151;
    }

    .dark .dataTables_wrapper table.dataTable thead {
        background-color: #374151;
        color: #d1d5db;
    }

    .dataTables_wrapper table.dataTable thead th {
        padding: 0.75rem 1.5rem;
        font-weight: 700;
        background: none;
        color: inherit;
        border-bottom: none;
        letter-spacing: 0.05em;
        text-shadow: none;
    }

    .dataTables_wrapper table.dataTable tbody td {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #e5e7eb;
        color: #334155;
        vertical-align: middle;
        background: transparent;
        transition: background 0.2s;
    }

    .dark .dataTables_wrapper table.dataTable tbody td {
        color: #e5e7eb;
        border-bottom: 1px solid #374151;
    }

    .dataTables_wrapper table.dataTable tbody tr {
        background-color: #fff;
        border-bottom: 1px solid #e5e7eb;
        transition: box-shadow 0.2s, background 0.2s;
    }

    .dark .dataTables_wrapper table.dataTable tbody tr {
        background-color: #1f2937;
        border-bottom: 1px solid #374151;
    }

    .dataTables_wrapper table.dataTable tbody tr:hover {
        background-color: #f3f4f6;
        box-shadow: none;
    }

    .dark .dataTables_wrapper table.dataTable tbody tr:hover {
        background-color: #374151;
    }

    .dataTables_wrapper table.dataTable.no-footer {
        border-bottom: none;
    }

    /* Pagination */
    .dataTables_wrapper .dataTables_paginate {
        margin-top: 1rem;
        text-align: right;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        background-color: #f3f4f6;
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        color: #2563eb;
        margin: 0 3px;
        padding: 6px 14px;
        font-weight: 600;
        font-size: 1rem;
        transition: background 0.2s, color 0.2s, border 0.2s;
    }

    .dark .dataTables_wrapper .dataTables_paginate .paginate_button {
        background-color: #374151;
        border: 1px solid #374151;
        color: #60a5fa;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #2563eb;
        color: #fff !important;
        border: 1px solid #2563eb;
    }

    .dark .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dark .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #60a5fa;
        color: #1e293b !important;
        border: 1px solid #60a5fa;
    }

    /* Length & Filter */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 1.25rem;
    }

    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        padding: 0.50rem 1rem;
        background-color: #f9fafb;
        color: #374151;
        font-size: 1rem;
        transition: border 0.2s, background 0.2s;
    }

    .dark .dataTables_wrapper .dataTables_length select,
    .dark .dataTables_wrapper .dataTables_filter input {
        background-color: #374151;
        color: #e5e7eb;
        padding: 1rem 0.75rem;
        border: 1px solid #374151;
    }

    .dataTables_wrapper .dataTables_length label,
    .dataTables_wrapper .dataTables_filter label {
        font-weight: 500;
        color: #374151;
        font-size: 0.875rem;
    }

    .dark .dataTables_wrapper .dataTables_length label,
    .dark .dataTables_wrapper .dataTables_filter label {
        color: #e5e7eb;
    }

    .dataTables_wrapper .dataTables_info {
        color: #6b7280;
        margin-top: 0.75rem;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .dark .dataTables_wrapper .dataTables_info {
        color: #d1d5db;
    }

    /* Responsive: Table scroll on small screens */
    @media (max-width: 900px) {
        .dataTables_wrapper {
            overflow-x: auto;
        }

        .dataTables_wrapper table.dataTable {
            min-width: 700px;
        }
    }

    /* Only show Previous and Next pagination buttons on mobile */
    @media (max-width: 640px) {
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            display: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.previous,
        .dataTables_wrapper .dataTables_paginate .paginate_button.next {
            display: inline-block;
        }
    }
</style>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route('users.data') }}',
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            drawCallback: function() {
                // Re-inisialisasi flowbite modal setelah data dirender ulang
                if (typeof window.initFlowbite === 'function') {
                    window.initFlowbite();
                }
            }
        });
    });
</script>
