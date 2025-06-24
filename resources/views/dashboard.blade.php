<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-900 leading-tight dark:text-white">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="p-4 sm:ml-64">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-8">
            <!-- Buku Card -->
            <div class="flex items-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition">
                <div class="p-3 mr-4 bg-blue-100 rounded-full dark:bg-blue-900">
                    <svg class="w-8 h-8 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 20l9 2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v16l9-2z" />
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-800 dark:text-white">{{ $bukuCount ?? 0 }}</div>
                    <div class="text-gray-500 dark:text-gray-300">Total Buku</div>
                </div>
            </div>
            <!-- Supplier Card -->
            <div class="flex items-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition">
                <div class="p-3 mr-4 bg-green-100 rounded-full dark:bg-green-900">
                    <svg class="w-8 h-8 text-green-600 dark:text-green-300" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0Zm-8 8a4 4 0 0 1 8 0v1a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-1a4 4 0 0 1 4-4Z" />
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-800 dark:text-white">{{ $supplierCount ?? 0 }}</div>
                    <div class="text-gray-500 dark:text-gray-300">Total Supplier</div>
                </div>
            </div>
            <!-- Customer Card -->
            <div class="flex items-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition">
                <div class="p-3 mr-4 bg-yellow-100 rounded-full dark:bg-yellow-900">
                    <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-300" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10Zm-7 8a7 7 0 0 1 14 0v1H5v-1Z" />
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-800 dark:text-white">{{ $customerCount ?? 0 }}</div>
                    <div class="text-gray-500 dark:text-gray-300">Total Customer</div>
                </div>
            </div>
            <!-- Masuk Card -->
            <div class="flex items-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition">
                <div class="p-3 mr-4 bg-indigo-100 rounded-full dark:bg-indigo-900">
                    <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-300" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3a1 1 0 0 1 1 1v10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-5 5a1 1 0 0 1-1.414 0l-5-5a1 1 0 1 1 1.414-1.414L11 14.586V4a1 1 0 0 1 1-1Z" />
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-800 dark:text-white">{{ $masukCount ?? 0 }}</div>
                    <div class="text-gray-500 dark:text-gray-300">Total Buku Masuk</div>
                </div>
            </div>
            <!-- Keluar Card -->
            <div class="flex items-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition">
                <div class="p-3 mr-4 bg-red-100 rounded-full dark:bg-red-900">
                    <svg class="w-8 h-8 text-red-600 dark:text-red-300" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 21a1 1 0 0 1-1-1V9.414l-3.293 3.293a1 1 0 1 1-1.414-1.414l5-5a1 1 0 0 1 1.414 0l5 5a1 1 0 1 1-1.414 1.414L13 9.414V20a1 1 0 0 1-1 1Z" />
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-800 dark:text-white">{{ $keluarCount ?? 0 }}</div>
                    <div class="text-gray-500 dark:text-gray-300">Total Buku Keluar</div>
                </div>
            </div>
            <!-- Opname Card -->
            <div class="flex items-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition">
                <div class="p-3 mr-4 bg-purple-100 rounded-full dark:bg-purple-900">
                    <svg class="w-8 h-8 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <rect width="18" height="18" x="3" y="3" fill="currentColor" rx="2" />
                        <path fill="#fff" d="M7 11h10v2H7z" />
                        <path fill="#fff" d="M11 7h2v10h-2z" />
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-800 dark:text-white">{{ $opnameCount ?? 0 }}</div>
                    <div class="text-gray-500 dark:text-gray-300">Total Opname</div>
                </div>
            </div>
        </div>
        <!-- Chart Placeholder (Flowbite/Chart.js) -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Statistik Buku</h3>
            <canvas id="dashboardChart" height="80"></canvas>
        </div>
    </div>
    <!-- Chart.js CDN for demo -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('dashboardChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($keluarPerHariLabels ?? []) !!},
                datasets: [{
                    label: 'Buku Keluar per Hari',
                    data: {!! json_encode($keluarPerHariData ?? []) !!},
                    backgroundColor: '#ef4444',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</x-app-layout>
