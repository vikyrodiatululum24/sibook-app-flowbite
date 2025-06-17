<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>404 - Tidak Ditemukan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 flex flex-col justify-center items-center h-screen text-center">
    <div class="relative">
        <div class="text-9xl font-black text-blue-600 animate-pulse">404</div>
        <div class="text-xl mt-4 text-blue-800">Yah! Halaman yang kamu cari tidak ditemukan.</div>

        <!-- Animasi kaca pembesar -->
        <div class="w-20 h-20 mt-6 relative animate-spin-slow">
            <svg fill="none" viewBox="0 0 24 24" class="w-full h-full text-blue-400">
                <path fill="currentColor"
                    d="M10 2a8 8 0 015.29 13.71l4 4a1 1 0 01-1.42 1.42l-4-4A8 8 0 1110 2zm0 2a6 6 0 100 12A6 6 0 0010 4z" />
            </svg>
        </div>
    </div>
    <a href="{{ url('/') }}" class="mt-6 px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
        Kembali ke Beranda
    </a>

    <style>
        @keyframes spin-slow {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .animate-spin-slow {
            animation: spin-slow 6s linear infinite;
        }
    </style>
</body>
</html>