<x-app-layout>
    <div class="p-4 sm:ml-64 pt-30 relative">
        <div
            class="flex flex-col bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
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
            <div class="p-4">
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
                <form action="{{ route('masuk.store') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                        <label for="supplier_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier</label>
                        <select id="supplier_id" name="supplier_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required readonly()>
                            <option value="{{ $suppliers->id }}">{{ $suppliers->name }}</option>
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
                        <textarea type="text" id="keterangan" name="keterangan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
