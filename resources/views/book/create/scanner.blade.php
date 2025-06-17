<section>
    <div class="p-4 bg-white rounded shadow">
        <div class="bg-base-100 overflow-hidden shadow-xs sm:rounded-lg">
            <div class="p-6 text-base-content">
                <div class="sm:flex sm:flex-wrap gap-4 sm:gap-6 sm:w-full">
                    <div id="reader" class=""></div>
                    <div class="result">
                        <div id="result" class="text-base-content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/html5-qrcode"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        console.log(`Code matched = ${decodedText}`, decodedResult);

        document.getElementById('result').textContent = decodedText;

        window.location.href = `/scanner/result/${encodeURIComponent(decodedText)}`;
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
