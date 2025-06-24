<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #fff;
    }

    .pdf-container {
        width: 100vw;
        min-height: 100vh;
        padding: 32px 16px;
        box-sizing: border-box;
    }

    h1 {
        text-align: center;
        margin-bottom: 24px;
    }

    table,
    th,
    td {
        border: 1px solid #000 !important;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 8px;
    }

    table {
        width: 100%;
        background: #fff;
    }

    .summary {
        display: flex;
        gap: 16px;
        margin-bottom: 24px;
        justify-content: center;
    }

    .summary-item {
        background: #f3f3f3;
        border-radius: 8px;
        padding: 16px 24px;
        text-align: center;
        min-width: 180px;
    }

    .summary-label {
        color: #555;
        font-size: 14px;
    }

    .summary-value {
        font-size: 20px;
        font-weight: bold;
    }
</style>
<div class="pdf-container">
    <h2 style="text-align:left; font-size:20px; margin-bottom:8px; margin-top:0; font-weight:bold;">Laporan Opname</h2>
    <p style="margin-bottom: 16px; text-align:left; font-size:15px;">Total Stok Sistem : {{ $totalJumlahSistem }}</p>
    <p style="margin-bottom: 16px; text-align:left; font-size:15px;">Total Stok Fisik : {{ $totalJumlahOpname }}</p>
    <p style="margin-bottom: 16px; text-align:left; font-size:15px;">Total Selisih : {{ $totalSelisih }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Judul Buku</th>
                <th>Stok Sistem</th>
                <th>Stok Fisik</th>
                <th>Selisih</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reports as $index => $report)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $report->created_at->format('d-m-Y') }}</td>
                    <td>{{ $report->buku->name }}</td>
                    <td>{{ $report->stock_system }}</td>
                    <td>{{ $report->stock_opname }}</td>
                    <td>{{ $report->selisih }}</td>
                    <td>{{ $report->keterangan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center;">Tidak ada data laporan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
