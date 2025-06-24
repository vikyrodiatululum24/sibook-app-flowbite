<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex justify-between items-center">
            <h2 class="font-bold text-blue-900 text-3xl mb-4  leading-tight dark:text-white">
                {{ __('Opname Buku') }}
            </h2>
            <div class="flex gap-4 items-center ml-auto">
                <!-- Modal toggle -->
                <button data-modal-target="static-modal" data-modal-toggle="static-modal"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition"
                    type="button">
                    <span class="mr-2">
                        <!-- SVG Export (Arrow Up) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path d="M12 19V5" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <path d="M5 12l7-7 7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" fill="none" />
                        </svg>
                        </svg>
                    </span>
                    Laporan Opname
                </button>

                <!-- Main modal -->
                <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Laporan Opname Buku
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="static-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form action="{{ route('view.report') }}" method="GET" enctype="multipart/form-data"
                                class="p-4 md:p-5 space-y-4">
                                @csrf
                                <div>
                                    <label for="bulan_export" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">
                                        Pilih Periode
                                    </label>
                                    <select name="month" id="bulan_export"
                                        class="border border-gray-300 dark:bg-gray-800 dark:text-white rounded-lg py-2 px-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500 transition text-sm bg-gray-50 dark:border-gray-600">
                                        @foreach ($bulanList as $bulan)
                                            <option value="{{ $bulan }}" @if (($month ?? '') == $bulan) selected @endif>
                                                {{ \Carbon\Carbon::createFromFormat('Y-m', $bulan)->translatedFormat('F Y') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition">
                                    Export
                                </button>
                                <button data-modal-hide="static-modal" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <a href="{{ route('opname.scan') }}"
                    class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-200 active:bg-green-600 transition mr-2">
                    <span class="mr-2">
                        <!-- SVG Scan -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>
                    </span>
                    Tambah
                </a>
            </div>
        </div>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <form method="GET" action="{{ route('opname.index') }}" class="mb-4 flex gap-2 items-center"
            onsubmit="return false;">
            <label for="bulan" class="text-sm font-medium text-gray-700 dark:text-gray-200">Pilih Periode:</label>
            <select name="month" id="bulan" class="form-select select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($bulanList as $bulan)
                    <option value="{{ $bulan }}" @if (($month ?? '') == $bulan) selected @endif>
                        {{ \Carbon\Carbon::createFromFormat('Y-m', $bulan)->translatedFormat('F Y') }}
                    </option>
                @endforeach
            </select>
        </form>
        <table id="example" class="min-w-full divide-y divide-gray-200 table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Buku</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stok Sistem</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stok Opname</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Selisih</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
        </table>
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

{{-- ajax datatable --}}
<script>
    $(document).ready(function() {
        let month = $('select[name="month"]').val();
        $('#example').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('opnames.data') }}',
                data: function(d) {
                    d.month = month;
                }
            },
            columns: [{
                    data: 'buku.name',
                    name: 'buku.name'
                },
                {
                    data: 'stock_system',
                    name: 'stock_system'
                },
                {
                    data: 'stock_opname',
                    name: 'stock_opname'
                },
                {
                    data: 'selisih',
                    name: 'selisih'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            drawCallback: function() {
                if (typeof window.initFlowbite === 'function') {
                    window.initFlowbite();
                }
            }
        });
        $('select[name="month"]').on('change', function() {
            month = $(this).val();
            $('#example').DataTable().ajax.reload();
        });
    });
</script>

{{-- drop zone --}}
<script>
    function showFileName() {
        const input = document.getElementById('dropzone-file');
        const fileSelected = document.getElementById('file-selected');
        if (input.files && input.files.length > 0) {
            fileSelected.textContent = 'File terpilih: ' + input.files[0].name;
            fileSelected.classList.remove('hidden');
        } else {
            fileSelected.textContent = '';
            fileSelected.classList.add('hidden');
        }
    }
</script>
