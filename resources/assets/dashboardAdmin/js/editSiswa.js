// Menangkap elemen tombol "Edit"
const editButtons = document.querySelectorAll("#editButton");

// Menambahkan event listener untuk menangkap klik pada tombol "Edit"
editButtons.forEach(function (editButton) {
    editButton.addEventListener("click", function () {
        // Mengambil nilai NIS dari atribut data-nis pada tombol "Edit"
        const nis = editButton.getAttribute("data-nis");
        const nama = editButton.getAttribute("data-nama");
        const alamat = editButton.getAttribute("data-alamat");
        const jurusan = editButton.getAttribute("data-jurusan");
        const notelp = editButton.getAttribute("data-no_telp");
        const jk = editButton.getAttribute("data-jk");
        const kelas = editButton.getAttribute("data-kelas");
        const varkelas = editButton.getAttribute("data-varkelas");
        const tglahir = editButton.getAttribute("data-tglahir");

        // Mengisi nilai input tersembunyi dengan nilai NIS yang diambil
        document.getElementById("nis1").value = nis;
        document.getElementById("nama1").value = nama;
        document.getElementById("alamat1").value = alamat;
        document.getElementById("jurusan1").value = jurusan;
        document.getElementById("noTelepon1").value = notelp;
        document.getElementById("jenisKelamin1").value = jk;
        document.getElementById("kelas1").value = kelas;
        document.getElementById("varKelas1").value = varkelas;
        document.getElementById("tanggalLahir1").value = tglahir;

        // Mengubah action formulir untuk menggunakan nilai nis yang diambil
        document.getElementById("form-update").action = `/api/siswa/${nis}`;

        // Tampilkan modal
        document.getElementById("editModal").style.display = "block";
    });
});

// Menangkap elemen tombol "Tutup" pada modal
const closeButton = document.getElementById("closeButton");

// Menambahkan event listener untuk menangkap klik pada tombol "Tutup"
closeButton.addEventListener("click", function () {
    // Sembunyikan modal
    document.getElementById("editModal").style.display = "none";
});

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
}
