/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!*********************************************************!*\
  !*** ./resources/assets/dashboardAdmin/js/editSiswa.js ***!
  \*********************************************************/
__webpack_require__.r(__webpack_exports__);
// Menangkap elemen tombol "Edit"
var editButtons = document.querySelectorAll("#editButton");

// Menambahkan event listener untuk menangkap klik pada tombol "Edit"
editButtons.forEach(function (editButton) {
  editButton.addEventListener("click", function () {
    // Mengambil nilai NIS dari atribut data-nis pada tombol "Edit"
    var nis = editButton.getAttribute("data-nis");
    var nama = editButton.getAttribute("data-nama");
    var alamat = editButton.getAttribute("data-alamat");
    var jurusan = editButton.getAttribute("data-jurusan");
    var notelp = editButton.getAttribute("data-no_telp");
    var jk = editButton.getAttribute("data-jk");
    var kelas = editButton.getAttribute("data-kelas");
    var varkelas = editButton.getAttribute("data-varkelas");
    var tglahir = editButton.getAttribute("data-tglahir");

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
    document.getElementById("form-update").action = "/api/siswa/".concat(nis);

    // Tampilkan modal
    document.getElementById("editModal").style.display = "block";
  });
});

// Menangkap elemen tombol "Tutup" pada modal
var closeButton = document.getElementById("closeButton");

// Menambahkan event listener untuk menangkap klik pada tombol "Tutup"
closeButton.addEventListener("click", function () {
  // Sembunyikan modal
  document.getElementById("editModal").style.display = "none";
});
var confirmButton = document.getElementById("confirmButton");
if (confirmButton) {
  confirmButton.addEventListener("click", saveChanges);
}
function saveChanges() {
  Swal.fire({
    title: "Perubahan Disimpan!",
    icon: "success",
    timer: 3000
  });
}
/******/ })()
;