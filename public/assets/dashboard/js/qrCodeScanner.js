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
/*!********************************************************!*\
  !*** ./resources/assets/dashboard/js/qrCodeScanner.js ***!
  \********************************************************/
__webpack_require__.r(__webpack_exports__);
var scanNav = document.getElementById("scanNav");
if (scanNav) {
  scanNav.addEventListener('click', toggleScan);
}
function toggleScan() {
  var reader = document.getElementById("qrCodeReader");
  var qrcodeContainer = document.getElementById("qrcodeContainer");
  if (reader.style.display === "none") {
    reader.style.display = "block";
    qrcodeContainer.style.display = "none";
  } else {
    reader.style.display = "none";
    qrcodeContainer.style.display = "block";
  }
}
var html5QrcodeScanner = null;
function startScanner() {
  if (!html5QrcodeScanner) {
    html5QrcodeScanner = new Html5QrcodeScanner("qrCodeReader", {
      fps: 10,
      qrbox: 250,
      aspectRatio: 1.0,
      rememberLastUsedCamera: true,
      supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
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
    timer: 5000
  });
  stopScanner();
  setTimeout(function () {
    location.reload();
  }, 2000);
}
function onScanError(errorMessage) {
  // You can handle scan errors here
}

// Start the scanner when the page loads
document.addEventListener("DOMContentLoaded", startScanner);

// Cleanup the scanner when the page is unloaded
window.addEventListener("beforeunload", stopScanner);
/******/ })()
;