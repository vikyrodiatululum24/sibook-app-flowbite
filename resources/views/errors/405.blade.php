<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>500 - Kesalahan Server</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-red-50 flex flex-col justify-center items-center h-screen text-center">
    <div class="relative">
        <div class="text-9xl font-black text-red-600 animate-wiggle">500</div>
        <div class="text-xl mt-4 text-red-800">Waduh! Ada yang salah di sisi server.</div>

        <!-- Api animasi dengan SVG -->
        <svg class="w-16 h-16 mt-6 animate-blink text-red-500" fill="currentColor" viewBox="0 0 20 20">
            <path d="M13.828 10.828a4 4 0 10-5.656 0L10 12.657l1.828-1.829zM10 18a8 8 0 100-16 8 8 0 000 16z" />
        </svg>
    </div>
    <a href="{{ url('/') }}" class="mt-6 px-6 py-2 bg-red-500 text-white rounded hover:bg-red-600">
        Coba Lagi
    </a>

    <style>
        @keyframes wiggle {
            0%, 100% { transform: rotate(-2deg); }
            50% { transform: rotate(2deg); }
        }

        .animate-wiggle {
            animation: wiggle 0.4s ease-in-out infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.1; }
        }

        .animate-blink {
            animation: blink 1s infinite;
        }
    </style>
</body>
</html>
