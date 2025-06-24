<x-app-layout>
    <div class="p-4 sm:ml-64 pt-30">
        <div
            class="flex flex-col mx-auto max-w-lg bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
            @if ($buku->cover != null)
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                    src="{{ asset('storage/' . $buku->cover) }}" alt="">
            @endif
            <div class="flex justify-between items-start">
                <div class="flex flex-col p-4 leading-normal">
                    <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $buku->name }}
                    </h5>
                    <h3 class="text-md font-semibold tracking-tight text-gray-900 dark:text-white ">{{ $buku->author }}
                    </h3>
                    <h3 class="mb-1 font-normal tracking-tight text-gray-900 dark:text-white">{{ $buku->th_terbit }}
                    </h3>
                    <p class="font-normal text-gray-700 dark:text-gray-400">{{ $buku->desc }}</p>
                </div>
                <div class="flex flex-col p-4 leading-normal justify-end">
                    <h5 class="mb-1 text-2xl font-bold tracking-tight text-right text-gray-900 dark:text-white">
                        {{ 'Rp ' . number_format($buku->harga, 0, ',', '.') }}
                    </h5>
                </div>
            </div>
            <div>
                <form class="p-4" action="{{ route('return.store') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                        <label for="customer_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer</label>
                        <select id="customer_id" name="customer_id"
                            class="form-select select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="" disabled selected></option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="jumlah"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                        <input type="number" id="jumlah" name="jumlah" min="1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                    </div>
                    <div class="mb-5">
                        <label for="keterangan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                        <textarea id="keterangan" name="keterangan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan Keterangan"></textarea>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

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
        $('#customer_id').select2({
            theme: 'default',
            placeholder: 'Pilih Customer',
            width: '100%',
            ajax: {
                url: '/api/customer',
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
