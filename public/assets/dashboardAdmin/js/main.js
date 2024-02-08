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
/*!****************************************************!*\
  !*** ./resources/assets/dashboardAdmin/js/main.js ***!
  \****************************************************/
__webpack_require__.r(__webpack_exports__);
// Fungsi Search pada Kelasfunction handleSearch() {
function handleSearch() {
  search();
}
function search() {
  var input, filter, tabels, i, j, txtValue;
  input = document.getElementById("cari");
  filter = input.value.toUpperCase();
  tabels = document.querySelectorAll('.tabel');
  tabels.forEach(function (tabel) {
    var rows = tabel.querySelectorAll('.table-data-siswa tr');
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
    }
    if (tabelMatch) {
      tabel.style.display = "block";
    } else {
      tabel.style.display = "none";
    }
  });
}
document.getElementById("cari").addEventListener("keyup", function (event) {
  if (event.key === "Enter") {
    handleSearch();
  } else {
    search();
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
      backgroundColor: "linear-gradient(90deg, rgb(189, 22, 22), rgb(214, 87, 87))"
    }).showToast();
  } else if (password !== conPassword) {
    // Menampilkan toast alert jika password dan konfirmasi password berbeda
    Toastify({
      text: "Password tidak sesuai!",
      duration: 3000,
      gravity: "top",
      position: "right",
      backgroundColor: "linear-gradient(180deg, rgb(189, 22, 22), rgb(214, 87, 87))"
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
/******/ })()
;