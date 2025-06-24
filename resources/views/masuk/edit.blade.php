<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex justify-center mx-auto items-center">
            <h2 class="font-semibold text-xl mb-4 text-gray-800 leading-tight dark:text-white">
                {{ __('Edit Data Buku Masuk') }}
            </h2>
        </div>
    </x-slot>


    <div class="py-6 sm:ml-64">
        <div class="p-4 flex-col max-w-xl mx-auto">
            {{-- Tampilkan error validasi --}}
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
            <form class="max-w-full" method="POST" action="{{ route('masuk.update', $masuk->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="buku_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Buku</label>
                    <select id="buku_id" name="buku_id"
                        class="form-select select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @if ($masuk->buku)
                            <option value="{{ $masuk->buku->id }}" selected>{{ $masuk->buku->name }}</option>
                        @endif
                    </select>
                </div>
                <div class="mb-4">
                    <label for="supplier_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier</label>
                    <select id="supplier" name="supplier_id"
                        class="form-select select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @if ($masuk->supplier)
                            <option value="{{ $masuk->supplier->id }}" selected>{{ $masuk->supplier->name }}</option>
                        @endif
                    </select>
                </div>
                <div class="mb-4">
                    <label for="jumlah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                    <input type="number" id="jumlah" name="jumlah"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukan Jumlah" required value="{{ old('jumlah', $masuk->jumlah) }}" />
                </div>
                <div class="mb-4">
                    <label for="tanggal_masuk"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Masuk</label>
                    <input type="date" id="tanggal_masuk" name="tanggal_masuk"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required value="{{ old('tanggal_masuk', $masuk->tanggal_masuk) }}" />
                </div>
                <div class="mb-4">
                    <label for="keterangan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                    <textarea id="keterangan" name="keterangan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukan Keterangan">{{ old('keterangan', $masuk->keterangan) }}</textarea>
                </div>
                <div class="flex gap-2">
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    <a href="{{ route('masuk.index') }}"
                        class="w-full text-center text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-800 dark:focus:ring-gray-800">Kembali</a>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>

{{-- jquery select2 --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Custom style agar Select2 seragam dengan input Tailwind -->
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


<script>
    $(document).ready(function() {
        $('#buku_id').select2({
            width: '100%', // supaya tetap full width
            placeholder: 'Masukan Nama Buku',
            ajax: {
                url: '/api/buku', // endpoint pencarian
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: data.map(item => ({
                            id: item.id,
                            text: item.name
                        }))
                    };
                },
                cache: true
            }
        });
        $('#supplier').select2({
            placeholder: 'Pilih supplier',
            width: '100%', // supaya tetap full width
            ajax: {
                url: '/api/supplier', // endpoint pencarian
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: data.map(item => ({
                            id: item.id,
                            text: item.name
                        }))
                    };
                },
                cache: true
            }
        });

        // Tambahkan class Tailwind ke container Select2
        $('#supplier').on('select2:open', function() {
            $('.select2-container--open .select2-selection').addClass(
                'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white'
            );
        });

        // Otomatis set supplier berdasarkan buku
        $('#buku_id').on('change', function() {
            var bukuId = $(this).val();
            if (bukuId) {
                // Ambil supplier otomatis
                $.ajax({
                    url: '/api/buku/' + bukuId + '/supplier',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var newOption = new Option(data.name, data.id, true, true);
                        $('#supplier').empty().append(newOption).trigger('change');
                    },
                    error: function() {
                        $('#supplier').empty().append('<option value="" selected></option>')
                            .trigger('change');
                    }
                });

            } else {
                $('#supplier').empty().append('<option value="" selected></option>').trigger('change');
                $('#stok_sistem').val('');
            }
        });

        // Nonaktifkan select supplier agar readonly
        $('#supplier').prop('disabled', true);
    });
</script>
