<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex justify-between items-center">
            <h2 class="font-semibold text-xl mb-4 text-gray-800 leading-tight dark:text-white">
                {{ __('Scan Buku Masuk') }}
            </h2>
        </div>
    </x-slot>
    <div class="sm:ml-64">
        <div class="px-4">
            <div class="overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <div class="sm:flex sm:flex-wrap gap-4 sm:gap-6 sm:w-full">
                        <div id="reader" class="dark:text-white"></div>
                        <div class="result">
                            <div id="result">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://unpkg.com/html5-qrcode"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        console.log(`Code matched = ${decodedText}`, decodedResult);

        document.getElementById('result').textContent = decodedText;

        window.location.href = `/buku-masuk/result/${encodeURIComponent(decodedText)}`;
    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        /* verbose= */
        false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
