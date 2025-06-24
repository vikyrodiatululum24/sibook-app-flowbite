<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex justify-center mx-autp items-center">
            <h2 class="font-semibold text-xl mb-4 text-gray-800 leading-tight dark:text-white">
                {{ __('Tambah Data Buku') }}
            </h2>

        </div>

    </x-slot>

    <div class="sm:ml-64">
        <div class="p-4">
            <form class="max-w-xl mx-auto" method="POST" action="{{ route('buku.store') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="inv_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">INV
                            ID</label>
                        <input type="text" id="inv_id" name="inv_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('inv_id') }}" required />
                    </div>
                    <div class="mb-4">
                        <label for="part_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Part
                            No</label>
                        <input type="text" id="part_no" name="part_no"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('part_no') }}" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Buku</label>
                        <input type="text" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('name') }}" required />
                    </div>
                    <div class="mb-4">
                        <label for="segment_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Segment Name</label>
                        <input type="text" id="segment_name" name="segment_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('segment_name') }}" />
                    </div>
                </div>
                <div class="mb-4">
                    <label for="desc"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea id="desc" name="desc"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('desc') }}</textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="mb-4">
                        <label for="class"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                        <input type="number" id="class" name="class"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('class') }}" />
                    </div>

                    <div class="mb-4">
                        <label for="kat09a"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kat09A</label>
                        <input type="text" id="kat09a" name="kat09a"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('kat09a') }}" />
                    </div>
                    <div class="mb-4">
                        <label for="group_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group
                            Name</label>
                        <input type="text" id="group_name" name="group_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('group_name') }}" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="penerbit"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
                        <input type="text" id="penerbit" name="penerbit"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('penerbit') }}" required />
                    </div>

                    <div class="mb-4">
                        <label for="isbn"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                        <input type="text" id="isbn" name="isbn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('isbn') }}" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="bid_studi1"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bidang
                            Studi 1</label>
                        <input type="text" id="bid_studi1" name="bid_studi1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('bid_studi1') }}" />
                    </div>
                    <div class="mb-4">
                        <label for="bid_studi2"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bidang
                            Studi 2</label>
                        <input type="text" id="bid_studi2" name="bid_studi2"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('bid_studi2') }}" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="mb-4">
                        <label for="th_terbit"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                            Terbit</label>
                        <input type="number" id="th_terbit" name="th_terbit"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('th_terbit') }}" />
                    </div>

                    <div class="mb-4">
                        <label for="harga"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                        <input type="number" step="0.01" id="harga" name="harga"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('harga') }}" />
                    </div>
                    <div class="mb-4">
                        <label for="stock"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                        <input type="number" id="stock" name="stock"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('stock') }}" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="author"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                        <input type="text" id="author" name="author"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('author') }}" />
                    </div>
                    <div class="mb-4">
                        <label for="curriculum"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kurikulum</label>
                        <input type="text" id="curriculum" name="curriculum"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('curriculum') }}" />
                    </div>
                </div>
                <div class="mb-6">
                    <label for="supplier_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier</label>
                    <div class="flex gap-2">
                        <select id="supplier" name="supplier_id"
                            class="form-select select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" disabled selected></option>
                        </select>
                        <!-- Modal toggle -->
                        <button data-modal-target="static-modal" data-modal-toggle="static-modal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                        </button>



                    </div>
                </div>
                <div class="flex gap-2">
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    <a href="{{ route('buku.index') }}"
                        class="w-full text-center text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-800 dark:focus:ring-gray-800">Kembali</a>
                </div>
            </form>
        </div>
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
                            Tambah Supplier
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
                    <form method="POST" action="{{ route('supplier.store.book') }}" class="">
                        @csrf
                        <div class="p-4 md:p-5 space-y-4">
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
                            <div class="mb-4">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Supplier</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <input type="text" name="address" id="address"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="mb-4">
                                <label for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon</label>
                                <input type="text" name="phone" id="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="flex gap-2">

                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            <button data-modal-hide="static-modal" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Inisialisasi Select2 untuk supplier
        $('#supplier').select2({
            width: '100%', // supaya tetap full width
            placeholder: 'Masukan Nama Supplier',
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

        $('#supplier').on('select2:open', function() {
            $('.select2-container--open .select2-selection').addClass(
                'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white'
            );
        });
    });
</script>
