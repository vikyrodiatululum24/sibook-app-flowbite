<section>
    <div class="py-6">
        <form class="max-w-sm mx-auto" method="POST" action="{{ route('buku.store') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Buku</label>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukan Nama Buku" required />
            </div>
            <div class="mb-4">
                <label for="supplier_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier</label>
                <select id="supplier" name="supplier_id"
                    class="form-select select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </select>
            </div>
            <div class="mb-4">
                <label for="jumlah"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                <input type="number" id="jumlah" name="jumlah"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukan Jumlah" required />
            </div>
            <div class="mb-4">
                <label for="tanggal_masuk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                    Masuk</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
            </div>
            <div class="mb-4">
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
</section>

{{-- select2 --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- get data select2 --}}
<script>
    $(document).ready(function() {
        $('#supplier').select2({
            placeholder: 'Cari buku...',
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
    });

    $(document).ready(function() {
        $('#supplier').select2({
            placeholder: 'Pilih supplier',
            width: '100%' // supaya tetap full width
        });

        // Tambahkan class Tailwind ke container Select2
        $('#supplier').on('select2:open', function() {
            $('.select2-container--open .select2-selection').addClass(
                'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white'
                );
        });
    });
</script>
