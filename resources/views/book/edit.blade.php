<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex justify-center mx-auto items-center">
            <h2 class="font-semibold text-xl mb-4 text-gray-800 leading-tight dark:text-white">
                {{ __('Edit Data Buku') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 sm:ml-64">
        <div class="p-4 flex-col max-w-xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow">
            <form class="max-w-xl mx-auto" method="POST" action="{{ route('buku.update', $buku->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="inv_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">INV
                        ID</label>
                    <input type="text" id="inv_id" name="inv_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('inv_id', $buku->inv_id) }}" required />
                </div>
                <div class="mb-4">
                    <label for="part_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Part
                        No</label>
                    <input type="text" id="part_no" name="part_no"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('part_no', $buku->part_no) }}" />
                </div>
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Buku</label>
                    <input type="text" id="name" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('name', $buku->name) }}" required />
                </div>
                <div class="mb-4">
                    <label for="desc"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea id="desc" name="desc"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('desc', $buku->desc) }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="segment_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Segment Name</label>
                    <input type="text" id="segment_name" name="segment_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('segment_name', $buku->segment_name) }}" />
                </div>
                <div class="mb-4">
                    <label for="class"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                    <input type="number" id="class" name="class"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('class', $buku->class) }}" />
                </div>
                <div class="mb-4">
                    <label for="kat09a"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kat09A</label>
                    <input type="text" id="kat09a" name="kat09a"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('kat09a', $buku->kat09a) }}" />
                </div>
                <div class="mb-4">
                    <label for="group_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group
                        Name</label>
                    <input type="text" id="group_name" name="group_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('group_name', $buku->group_name) }}" />
                </div>
                <div class="mb-4">
                    <label for="penerbit"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
                    <input type="text" id="penerbit" name="penerbit"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('penerbit', $buku->penerbit) }}" required />
                </div>
                <div class="mb-4">
                    <label for="isbn"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                    <input type="text" id="isbn" name="isbn"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('isbn', $buku->isbn) }}" />
                </div>
                <div class="mb-4">
                    <label for="bid_studi1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bidang
                        Studi 1</label>
                    <input type="text" id="bid_studi1" name="bid_studi1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('bid_studi1', $buku->bid_studi1) }}" />
                </div>
                <div class="mb-4">
                    <label for="bid_studi2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bidang
                        Studi 2</label>
                    <input type="text" id="bid_studi2" name="bid_studi2"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('bid_studi2', $buku->bid_studi2) }}" />
                </div>
                <div class="mb-4">
                    <label for="th_terbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                        Terbit</label>
                    <input type="number" id="th_terbit" name="th_terbit"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('th_terbit', $buku->th_terbit) }}" />
                </div>
                <div class="mb-4">
                    <label for="author"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                    <input type="text" id="author" name="author"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('author', $buku->author) }}" />
                </div>
                <div class="mb-4">
                    <label for="curriculum"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kurikulum</label>
                    <input type="text" id="curriculum" name="curriculum"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('curriculum', $buku->curriculum) }}" />
                </div>
                <div class="mb-4">
                    <label for="stock"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                    <input type="number" id="stock" name="stock"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('stock', $buku->stock) }}" />
                </div>
                <div class="mb-4">
                    <label for="harga"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                    <input type="number" step="0.01" id="harga" name="harga"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('harga', $buku->harga) }}" />
                </div>
                <div class="flex gap-2">
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    <a href="{{ route('buku.index') }}"
                        class="w-full text-center text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-800 dark:focus:ring-gray-800">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
