<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="img/logoLighh.png" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- DataTables core CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- DataTables TailwindCSS Theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datatables.net-dt@1.13.6/css/dataTables.tailwind.min.css">

    <!-- Latest -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/erimicel/select2-tailwindcss-theme/dist/select2-tailwindcss-theme-plain.min.css">
    <!-- Different version change (x.x.x) -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/erimicel/select2-tailwindcss-theme@x.x.x/dist/select2-tailwindcss-theme-plain.min.css">
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white dark:bg-gray-800">
        @include('layouts.navigation')
        @include('layouts.sidebar')

        <!-- Page Heading -->
        @isset($header)
            <header class="pt-20">
                <div class="sm:ml-64 py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    {{-- Alert Toast --}}
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end', // bisa diganti 'top-start', 'bottom-end' dll.
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

        @if (session('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        @endif

        @if (session('error'))
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            });
        @endif

        @php $failures = session('failures'); @endphp

        @if ($failures && $failures->isNotEmpty())
            Toast.fire({
                icon: 'warning',
                title: 'Sebagian data gagal diimpor. Klik untuk detail.',
                didOpen: (toast) => {
                    toast.addEventListener('click', () => {
                        Swal.fire({
                            title: 'Detail Kesalahan',
                            icon: 'warning',
                            html: `{!! '<ul style="text-align:left;">' .
                                collect($failures)->map(
                                        fn($f) => "<li><strong>Baris {$f->row()}</strong>: Kolom <em>{$f->attribute()}</em> - " .
                                            implode(', ', $f->errors()) .
                                            '</li>',
                                    )->implode('') .
                                '</ul>' !!}`,
                            width: '50rem',
                            confirmButtonText: 'OK'
                        });
                    });
                }
            });
        @endif
    </script>

</body>

</html>
</body>

</html>
