// Fungsi Search pada Kelasfunction handleSearch() {
function handleSearch() {
    var input, filter, tabels, i, j, txtValue;
    input = document.getElementById("cari");
    filter = input.value.toUpperCase();
    tabels = document.querySelectorAll('.tabel');

    tabels.forEach(function (tabel) {
        var rows = tabel.querySelectorAll('.table-data-jurusan tr');
        var tabelMatch = false;

        for (i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var rowMatch = false;

            for (j = 0; j < cells.length; j++) {
                txtValue = cells[j].textContent || cells[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    rowMatch = true;
                    tabelMatch = true;
                    break;
                }
            }
            // Menampilkan atau menyembunyikan baris berdasarkan hasil pencarian
            rows[i].style.display = rowMatch ? "" : "none";
        }

        // Menampilkan atau menyembunyikan tabel berdasarkan hasil pencarian
        tabel.style.display = tabelMatch ? "block" : "none";
    });
}

document.getElementById("cari").addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        handleSearch();
    }
});

//Fungsi Input Angka
var alertShown = false;

var nisInputs = document.querySelectorAll('.nis');
nisInputs.forEach(function (input) {
    input.addEventListener('input', function (event) {
        if (!/^\d*$/.test(event.target.value)) {
            if (!alertShown) {
                showToastAlert("Input tidak valid!");
                alertShown = true;
                setTimeout(function () {
                    alertShown = false;
                }, 3000);
            }
            event.target.value = event.target.value.replace(/[^\d]/g, '');
        } else {
            alertShown = false;
        }
    });
});

// Fungsi Input Nama
var namaInputs = document.querySelectorAll('.nama');
namaInputs.forEach(function (input) {
    input.addEventListener('input', function (event) {
        if (!/^[a-zA-Z\s\.']+$/g.test(event.target.value)) {
            if (!alertShown) {
                showToastAlert("Input tidak valid!");
                alertShown = true;
                setTimeout(function () {
                    alertShown = false;
                }, 3000);
            }
            event.target.value = event.target.value.replace(/[^a-zA-Z\s\.']/g, '');
        } else {
            alertShown = false;
        }
    });
});

function showToastAlert(message) {
    Toastify({
        text: message,
        duration: 3000,
        gravity: "top",
        position: 'right',
        backgroundColor: "#0099ff",
        stopOnFocus: true
    }).showToast();
}


// Konfirmasi
function confirmation() {
    var nis = document.getElementById("nis").value;
    var nama = document.getElementById("nama").value;
    var kelas = document.getElementById("kelas").value;
    var alamat = document.getElementById("alamat").value;
    var telepon = document.getElementById("hobi").value;
    var jenisKelamin = document.getElementById("jenisKelamin").value;
    var tanggalLahir = document.getElementById("tanggalLahir").value;
    var password = document.getElementById("password").value;
    var conPassword = document.getElementById("conPassword").value;

    if (nis === "" || nama === "" || kelas === "" || alamat === "" || telepon === "" || jenisKelamin === "" || tanggalLahir === "" || password === "" || conPassword === "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Harap isi semua input sebelum menambahkan data!'
        });
        return false;
    }

    if (password !== conPassword) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Konfirmasi password tidak sesuai!'
        });
        return false;
    }

    return true;
}


// Konfirmasi Tambah Siswa
var buttonFormCon = document.getElementById("buttonFormCon");
buttonFormCon.addEventListener("click", function () {
    // Mengambil nilai input password dan konfirmasi password
    var password = document.getElementById("password").value;
    var conPassword = document.getElementById("conPassword").value;

    // Melakukan validasi form
    if (!password || !conPassword) {
        // Menampilkan toast alert jika form belum lengkap
        Toastify({
            text: "Form belum lengkap!",
            duration: 1000,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(90deg, rgb(189, 22, 22), rgb(214, 87, 87))",
        }).showToast();
    } else if (password !== conPassword) {
        // Menampilkan toast alert jika password dan konfirmasi password berbeda
        Toastify({
            text: "Password tidak sesuai!",
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(180deg, rgb(189, 22, 22), rgb(214, 87, 87))",
        }).showToast();
    } else {
        // Menampilkan elemen dengan ID "confirm"
        document.getElementById("confirm").classList.add("aktif");
    }
});

document.getElementById("noButton").addEventListener("click", function () {
    var confirmElement = document.getElementById("confirm");

    confirmElement.classList.remove("aktif");
});

// Fungsi untuk membuka modal edit
var editButtons = document.querySelectorAll("#editButton");

// Menambahkan event listener ke setiap elemen dengan ID "editButton"
editButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        // Mengambil elemen dengan ID "editModal"
        var modalElement = document.getElementById("editModal");

        // Mengubah properti display menjadi "block"
        modalElement.style.display = "block";
    });
});

document.getElementById("closeButton").addEventListener("click", function () {
    var confirmElement = document.getElementById("editModal");

    confirmElement.style.display = "none";
});

document.querySelectorAll('.editButton').forEach(button => {
    button.addEventListener('click', function() {
        // Mendapatkan data dari baris yang dipilih
        const row = this.closest('tr');
        const nama = row.querySelector('.nama').innerText.trim();
        const nis = row.querySelector('.nis').innerText.trim();
        const alamat = row.querySelector('.alamat').innerText.trim();
        const jurusan = row.querySelector('.jurusan').innerText.trim();
        const noTelepon = row.querySelector('.noTelepon').innerText.trim();
        const jenisKelamin = row.querySelector('.jenisKelamin').innerText.trim();
        const kelas = row.querySelector('.kelas').innerText.trim();
        const hobi = row.querySelector('.hobi').innerText.trim();
        const tanggalLahir = row.querySelector('.tanggalLahir').innerText.trim();

        // Mengisi nilai-nilai dalam modal dengan nilai dari baris yang dipilih
        document.getElementById('nama1').value = nama;
        document.getElementById('nis1').value = nis;
        document.getElementById('alamat1').value = alamat;
        document.getElementById('jurusan1').value = jurusan;
        document.getElementById('noTelepon1').value = noTelepon;
        document.getElementById('jenisKelamin1').value = jenisKelamin;
        document.getElementById('kelas1').value = kelas;
        document.getElementById('hobi1').value = hobi;
        document.getElementById('tanggalLahir1').value = tanggalLahir;

        // Menampilkan modal
        document.getElementById('editModal').style.display = 'block';
    });
});