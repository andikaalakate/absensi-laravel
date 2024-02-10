let noHp = document.getElementById("noHp");
if (noHp) {
    noHp.addEventListener("input", validateNumberInput);
}
function validateNumberInput() {
    noHp.value = noHp.value.replace(/\D/g, "");
}

window.addEventListener("load", function () {
    let preload = document.getElementById("preload");

    preload.style.opacity = "0";
    preload.style.zIndex = "-9999";
    document.body.style.overflow = "visible";
});

let bukaTutupSidebar = document.getElementById("bukaTutupSidebar");
if (bukaTutupSidebar) {
    bukaTutupSidebar.addEventListener("click", bukaSidebar);
}
function bukaSidebar() {
    let sidebar = document.getElementById("container");
    let aside = document.getElementById("sidebar");
    let tandaPanah = document.getElementById("panah-sidebar");
    let dashContent = document.getElementById("dashContent");

    if (sidebar.style.gridTemplateColumns == "300px auto") {
        bukaTutupSidebar.style.width = "40px";
        sidebar.style.gridTemplateColumns = "40px auto";
        tandaPanah.style.transform = "rotate(0deg)";
        aside.style.width = "40px";
        dashContent.style.maxWidth = "calc(100% - 70px)";
    } else {
        aside.style.width = "300px";
        dashContent.style.maxWidth = "calc(100% - 330px)";
        bukaTutupSidebar.style.width = "300px";
        sidebar.style.gridTemplateColumns = "300px auto";
        tandaPanah.style.transform = "rotate(-180deg)";
    }
}

let dropdownMenu = document.getElementById("dropdownSetting");
if (dropdownMenu) {
    dropdownMenu.addEventListener("click", dropdownSetting);
}
function dropdownSetting() {
    if (document.getElementById("dropdownSetting").style.height == "40px") {
        document.getElementById("dropdownSetting").style.height = "auto";
    } else {
        document.getElementById("dropdownSetting").style.height = "40px";
    }
}

let submitButton = document.getElementById("submitButton");
if (submitButton) {
    submitButton.addEventListener("click", showConfirmation);
}
// simpan perubahan
function showConfirmation() {
    document.getElementById("overlay").style.display = "flex";
    document.getElementById("confirmationPopup").style.display = "flex";
}

let cancelButton = document.getElementById("cancelButton");
if (cancelButton) {
    cancelButton.addEventListener("click", hideConfirmation);
}
function hideConfirmation() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("confirmationPopup").style.display = "none";
}

let confirmButton = document.getElementById("confirmButton");
if (confirmButton) {
    confirmButton.addEventListener("click", saveChanges);
}
function saveChanges() {
    Swal.fire({
        title: "Perubahan Disimpan!",
        icon: "success",
        timer: 3000,
    });
    hideConfirmation();
}

// Fungsi Pencarian 
function search() {
    var input, filter, tabel, tr, td, i, txtValue;
    input = document.getElementById("cariNama");
    filter = input.value.toUpperCase();
    tabel = document.querySelector('.tabel-leaderboard');
    tr = tabel.querySelectorAll("tr");

    for (i = 1; i < tr.length; i++) { // Mulai dari 1 untuk melewati baris header
        td = tr[i].getElementsByTagName("td")[1]; // Ambil sel kedua (indeks 1) yang berisi nama
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = ""; // Tampilkan baris jika namanya cocok
            } else {
                tr[i].style.display = "none"; // Sembunyikan baris jika namanya tidak cocok
            }
        }
    }
}

// Tambahkan event listener untuk menangani input keyboard
document.getElementById("cariNama").addEventListener("input", search);

// Tambahkan event listener untuk menangani tombol Enter
document.getElementById("cariNama").addEventListener("keypress", function (event) {
    // Periksa apakah tombol yang ditekan adalah tombol Enter (kode 13)
    if (event.keyCode === 13) {
        search(); // Panggil fungsi pencarian saat tombol Enter ditekan
    }
});

document.addEventListener("DOMContentLoaded", function() {
    checkLocationPermission()
        .then(() => {
            // Izin lokasi diberikan, lakukan tindakan yang diperlukan di sini
            // console.log("Izin lokasi diberikan");
        })
        .catch((error) => {
            // Izin lokasi tidak diberikan atau ditolak, tangani kesalahan di sini
            // console.error("Tidak dapat mengakses izin lokasi:", error.message);
        });
});

function checkLocationPermission() {
    return new Promise((resolve, reject) => {
        navigator.permissions
            .query({ name: "geolocation" })
            .then((permissionStatus) => {
                if (permissionStatus.state === "granted") {
                    resolve();
                } else if (permissionStatus.state === "prompt") {
                    Swal.fire({
                        title: "Izin Lokasi",
                        text: 'Untuk menggunakan fitur ini, kami memerlukan akses lokasi Anda. Klik "Izinkan" pada prompt izin lokasi yang muncul.',
                        showCancelButton: true,
                        confirmButtonText: "Izinkan",
                        cancelButtonText: "Tidak Izinkan",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            resolve();
                        } else {
                            reject(new Error("Permission denied"));
                        }
                    });
                } else {
                    reject(new Error("Permission denied"));
                }
            })
            .catch((error) => {
                reject(error);
            });
    });
}
