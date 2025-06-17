<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>403 - Akses Ditolak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-yellow-50 flex flex-col justify-center items-center h-screen text-center">
    <div class="relative">
        <div class="text-9xl font-black text-yellow-600 animate-bounce">403</div>
        <div class="text-xl mt-4 text-yellow-800">Oops! Kamu tidak memiliki akses ke halaman ini.</div>
        <svg class="w-24 h-24 mt-6 animate-pulse text-yellow-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v2m0 4h.01M5.635 17.657A9 9 0 1118.364 6.343 9 9 0 015.636 17.657z" />
        </svg>
    </div>
    <a href="{{ url('/') }}" class="mt-6 px-6 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
        Kembali ke Beranda
    </a>
</body>
</html>
