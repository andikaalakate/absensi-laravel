var alertShown = false; // Variabel penanda apakah alert telah ditampilkan

document.getElementById('nis').addEventListener('input', function(event) {
    // Memeriksa apakah input adalah angka
    if (!/^\d*$/.test(event.target.value)) {
        // Jika bukan angka dan alert belum ditampilkan, tampilkan toast alert
        if (!alertShown) {
            showToastAlert("Input tidak valid !");
            alertShown = true; // Set alertShown menjadi true agar alert hanya muncul sekali
            setTimeout(function() {
                alertShown = false; // Setelah 3 detik, reset alertShown sehingga alert dapat muncul lagi
            }, 3000);
        }
        // Menghapus karakter selain angka dari input
        event.target.value = event.target.value.replace(/[^\d]/g, '');
    } else {
        alertShown = false; // Reset alertShown jika input valid
    }
});

function showToastAlert(message) {
    Toastify({
        text: message,
        duration: 3000,
        gravity: "top", // Posisi toast alert, bisa diganti dengan "bottom"
        position: 'left', // Posisi toast alert, bisa diganti dengan "right"
        backgroundColor: "#0099ff",
        stopOnFocus: true // Menghentikan durasi toast saat fokus ke input
    }).showToast();
}