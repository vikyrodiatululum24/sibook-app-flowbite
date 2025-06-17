<x-app-layout>
    <x-slot name="header">
        <div class="flex mx-auto justify-center items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">Edit Return Buku</h2>
        </div>
    </x-slot>
    <div class="py-6 sm:ml-64">
        <div class="p-4 max-w-lg mx-auto bg-white dark:bg-gray-800 rounded-lg shadow">
            <form method="POST" action="{{ route('return.update', $return->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="buku_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Buku</label>
                    <select id="buku_id" name="buku_id"
                        class="form-select select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" disabled selected></option>
                        @foreach ($bukus as $buku)
                            <option value="{{ $buku->id }}" @if ($return->buku_id == $buku->id) selected @endif>
                                {{ $buku->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="customer_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer</label>
                    <select id="customer_id" name="customer_id"
                        class="form-select select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" disabled selected></option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" @if ($return->customer_id == $customer->id) selected @endif>
                                {{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="tanggal_return"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Return</label>
                    <input type="date" name="tanggal_return" id="tanggal_return"
                        value="{{ $return->tanggal_return }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="jumlah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" value="{{ $return->jumlah }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="keterangan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" value="{{ $return->keterangan }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="flex gap-2">
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    <a href="{{ route('return.index') }}"
                        class="w-full text-center text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-800 dark:focus:ring-gray-800">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
