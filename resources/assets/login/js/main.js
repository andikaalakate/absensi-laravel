var alertShown = false; // Variabel penanda apakah alert telah ditampilkan

// Memeriksa URL saat ini untuk menentukan apakah sedang di rute '/login' atau '/admin/login'
var isLoginPage = window.location.pathname === '/login';
var inputId = isLoginPage ? 'nis' : 'username'; // Menentukan ID input berdasarkan rute

document.getElementById(inputId).addEventListener('input', function(event) {
    // Memeriksa apakah input adalah angka atau huruf tergantung pada rute yang ditemukan
    var regexPattern = isLoginPage ? /^\d*$/ : /^[a-zA-Z\s\.']+$/g;

    if (!regexPattern.test(event.target.value)) {
        // Jika bukan angka/huruf dan alert belum ditampilkan, tampilkan toast alert
        if (!alertShown) {
            showToastAlert("Input tidak valid!");
            alertShown = true; // Set alertShown menjadi true agar alert hanya muncul sekali
            setTimeout(function () {
                alertShown = false; // Setelah 3 detik, reset alertShown sehingga alert dapat muncul lagi
            }, 3000);
        }
        // Menghapus karakter tidak valid dari input
        event.target.value = event.target.value.replace(isLoginPage ? /[^\d]/g : /[^a-zA-Z\s\.']/g, '');
    } else {
        alertShown = false; // Reset alertShown jika input valid
    }
});

function showToastAlert(message) {
    Toastify({
        text: message,
        duration: 3000,
        gravity: "top", // Posisi toast alert, bisa diganti dengan "bottom"
        position: 'right', // Posisi toast alert, bisa diganti dengan "right"
        backgroundColor: "#0099ff",
        stopOnFocus: true // Menghentikan durasi toast saat fokus ke input
    }).showToast();
}
