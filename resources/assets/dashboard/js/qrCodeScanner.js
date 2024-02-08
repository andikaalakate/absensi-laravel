function toggleScan() {
    let reader = document.getElementById("qrCodeReader");
    let qrcodeContainer = document.getElementById("qrcodeContainer");

    if (reader.style.display === "none") {
        reader.style.display = "block";
        qrcodeContainer.style.display = "none";
        startScanner();
    } else {
        reader.style.display = "none";
        qrcodeContainer.style.display = "block";
        stopScanner();
    }
}

let html5QrcodeScanner = null;

function startScanner() {
    if (!html5QrcodeScanner) {
        html5QrcodeScanner = new Html5QrcodeScanner("qrCodeReader", {
            fps: 10,
            qrbox: 250,
            aspectRatio: 1.0,
            rememberLastUsedCamera: true,
            supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA],
        });
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    }
}

function stopScanner() {
    if (html5QrcodeScanner) {
        html5QrcodeScanner.clear();
        html5QrcodeScanner = null;
    }
}

function onScanSuccess(qrCodeMessage) {
    Swal.fire({
        icon: "success",
        title: "Berhasil!",
        showConfirmButton: false,
        timer: 5000,
    });
    setTimeout(function() {
        location.reload();
    }, 5000); // 5 seconds
    submitFormWithLocation();
    // stopScanner();
}

document.querySelectorAll('.form-submit').forEach(function(form) {
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        submitFormWithLocation(form);
    });
});

function submitFormWithLocation(form) {
    var form = document.getElementById("form-submit");
    var nisInput = form.querySelector("input[name='nis']");
    var statusInput = form.querySelector("input[name='status']");
    var tokenInput = form.querySelector("input[name='_token']");
    var qrCodeMessage = document.getElementById("qrCodeMessage").textContent;
    var data = {
        _token: tokenInput.value,
        nis: nisInput.value,
        lokasi_masuk: latitude + "," + longitude,
        jam_masuk: new Date(), // Use new Date() to get the current date and time
        jam_keluar: null,
        status: statusInput.value
    };

    fetch(qrCodeMessage, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            '_token': tokenInput.value,
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            showConfirmButton: false,
            timer: 5000,
        });
        stopScanner();
    })
    .catch(error => {
        console.error('Error:', error);
        alert("Failed to submit form with location.");
    });
}


function onScanError(errorMessage) {
    console.error("QR Code scan error:", errorMessage);
}

document.addEventListener("DOMContentLoaded", function() {
    var scanNav = document.getElementById("scanNav");
    if (scanNav) {
        scanNav.addEventListener('click', toggleScan);
    }
});

window.addEventListener("beforeunload", stopScanner);
