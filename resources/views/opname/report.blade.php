<x-app-layout>
    <div class="container mt-20 sm:ml-64 mx-auto px-4 py-8">
        <div class="flex items-center mb-8 justify-between">
            <h1 class="text-2xl font-bold mb-6">Laporan Opname</h1>
            <div class="mb-4">
                <!-- Tombol Export PDF & Excel -->
                <a href="{{ route('excel.report', request()->query()) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mr-2">
                    Export Excel
                </a>
                <a href="{{ route('pdf.report', request()->query()) }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                    Export PDF
                </a>
            </div>
        </div>

        <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div style="padding: 16px; background: #f3f4f6; border-radius: 8px; text-align: center;">
            <div style="color: #4b5563;">Total Stok Sistem</div>
            <div style="font-size: 1.25rem; font-weight: bold;">{{ $totalJumlahSistem }}</div>
            </div>
            <div style="padding: 16px; background: #f3f4f6; border-radius: 8px; text-align: center;">
            <div style="color: #4b5563;">Total Stok Fisik</div>
            <div style="font-size: 1.25rem; font-weight: bold;">{{ $totalJumlahOpname }}</div>
            </div>
            <div style="padding: 16px; background: #f3f4f6; border-radius: 8px; text-align: center;">
            <div style="color: #4b5563;">Total Selisih</div>
            <div style="font-size: 1.25rem; font-weight: bold;">{{ $totalSelisih }}</div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border-1">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Judul Buku</th>
                        <th class="px-4 py-2 border">Stok Sistem</th>
                        <th class="px-4 py-2 border">Stok Fisik</th>
                        <th class="px-4 py-2 border">Selisih</th>
                        <th class="px-4 py-2 border">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $index => $report)
                        <tr>
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $report->created_at->format('d-m-Y') }}</td>
                            <td class="px-4 py-2 border">{{ $report->buku->name }}</td>
                            <td class="px-4 py-2 border">{{ $report->stock_system }}</td>
                            <td class="px-4 py-2 border">{{ $report->stock_opname }}</td>
                            <td class="px-4 py-2 border">{{ $report->selisih }}</td>
                            <td class="px-4 py-2 border">{{ $report->keterangan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center px-4 py-2 border">Tidak ada data laporan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
