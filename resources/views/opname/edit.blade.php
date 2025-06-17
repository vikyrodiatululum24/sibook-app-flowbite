<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between text-center items-center max-w-lg mx-auto">
            <h2 class="font-semibold text-xl mb-4 text-gray-800 leading-tight dark:text-white">
                {{ __('Edit Data Opname') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 sm:ml-64">
        {{-- Tampilkan error validasi --}}
        <div class="p-4 flex-col max-w-lg mx-auto bg-white dark:bg-gray-800 rounded-lg shadow">
            {{-- Jika ada error validasi, tampilkan pesan error --}}
            @if ($errors->any())
                <div class="mb-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <form class="max-w-full" method="POST" action="{{ route('opname.update', $opname->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="buku_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Buku</label>
                    <select id="buku_id" name="buku_id"
                        class="form-select select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @if ($opname->buku)
                            <option value="{{ $opname->buku->id }}" selected>{{ $opname->buku->name }}</option>
                        @endif
                    </select>
                </div>
                {{-- Tambahkan input stok sistem --}}
                <div class="mb-4">
                    <label for="stock_system" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok
                        Sistem</label>
                    <input type="number" id="stock_system" name="stock_system"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Stok sistem otomatis" readonly
                        value="{{ old('stock_system', $opname->stock_system) }}" />
                </div>
                <div class="mb-4">
                    <label for="stock_opname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock
                        Opname</label>
                    <input type="number" id="stock_opname" name="stock_opname"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukan Stock Opname" required
                        value="{{ old('stock_opname', $opname->stock_opname) }}" />
                </div>
                <div class="mb-4">
                    <label for="tanggal_opname"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Opname</label>
                    <input type="date" id="tanggal_opname" name="tanggal_opname"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required
                        value="{{ old('tanggal_opname', $opname->tanggal_opname ? \Illuminate\Support\Carbon::parse($opname->tanggal_opname)->format('Y-m-d') : '') }}" />
                </div>
                <div class="flex gap-2">
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    <a href="{{ route('opname.index') }}"
                        class="w-full text-center text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-800 dark:focus:ring-gray-800">Kembali</a>
                </div>
            </form>
        </div>
    </div>


    <style>
        .select2-container .select2-selection--single {
            background-color: #f9fafb !important;
            border: 1px solid #d1d5db !important;
            color: #111827 !important;
            border-radius: 0.5rem !important;
            min-height: 42px;
            display: flex;
            align-items: center;
            padding: 0.5rem 0.75rem;
            position: relative;
        }

        .dark .select2-container .select2-selection--single {
            background-color: #374151 !important;
            border-color: #4b5563 !important;
            color: #fff !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: inherit !important;
            line-height: normal !important;
            padding-left: 0 !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100% !important;
            top: 50% !important;
            right: 10px !important;
            transform: translateY(-50%);
            width: 24px !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            background-color: #f9fafb !important;
            color: #111827 !important;
            border: 1px solid #d1d5db !important;
            border-radius: 0.5rem !important;
            padding: 0.5rem 0.75rem !important;
        }

        .dark .select2-container--default .select2-search--dropdown .select2-search__field {
            background-color: #374151 !important;
            color: #fff !important;
            border-color: #4b5563 !important;
        }


        /* Support dark mode for select2 dropdown options */
        .select2-container--default .select2-results__option {
            background-color: #fff;
            color: #111827;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #2563eb;
            color: #fff;
        }

        .dark .select2-container--default .select2-results__option {
            background-color: #374151 !important;
            color: #fff !important;
        }

        .dark .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #2563eb !important;
            color: #fff !important;
        }
    </style>
    {{-- select2 --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#buku_id').select2({
                theme: 'default',
                placeholder: 'Pilih Buku',
                width: '100%',
                ajax: {
                    url: '/api/buku',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.map(function(item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                };
                            })
                        };
                    },
                    cache: true
                }
            });
        });
    </script>

    <script>
        // Otomatis set supplier berdasarkan buku
        $('#buku_id').on('change', function() {
            var bukuId = $(this).val();
            if (bukuId) {
                // Ambil stok sistem otomatis
                $.ajax({
                    url: '/api/buku/' + bukuId + '/stok',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#stock_system').val(data.stock ?? 0);
                    },
                    error: function() {
                        $('#stock_system').val('');
                    }
                });
            } else {
                $('#stock_system').val('');
            }
        });
    </script>
</x-app-layout>
