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
  !*** ./resources/assets/dashboardAdmin/js/peringkat.js ***!
  \*********************************************************/
__webpack_require__.r(__webpack_exports__);
function search() {
  var input, filter, tabel, tr, td, i, txtValue;
  input = document.getElementById("cariNama");
  filter = input.value.toUpperCase();
  tabel = document.querySelector('.tabel-leaderboard');
  tr = tabel.querySelectorAll("tr");
  for (i = 1; i < tr.length; i++) {
    // Mulai dari 1 untuk melewati baris header
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
/******/ })()
;