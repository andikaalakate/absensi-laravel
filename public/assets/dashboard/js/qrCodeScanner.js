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
function toggleScan() {
  var reader = document.getElementById("qrCodeReader");
  var qrcodeContainer = document.getElementById("qrcodeContainer");
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
var html5QrcodeScanner = null;
var isScanned = false;
function startScanner() {
  if (!html5QrcodeScanner && !isScanned) {
    html5QrcodeScanner = new Html5QrcodeScanner("qrCodeReader", {
      fps: 10,
      qrbox: 250,
      aspectRatio: 1.0,
      rememberLastUsedCamera: true,
      supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA],
      idleTimeout: 10000
    });
    html5QrcodeScanner.render(onScanSuccess, onScanError);
  }
}
function stopScanner() {
  if (html5QrcodeScanner) {
    html5QrcodeScanner.stop();
    html5QrcodeScanner.clear();
    html5QrcodeScanner = null;
  }
}
function onScanSuccess(qrCodeMessage) {
  if (!isScanned) {
    // Swal.fire({
    //     icon: "success",
    //     title: "Berhasil!",
    //     showConfirmButton: false,
    //     timer: 5000,
    // });
    submitFormWithLocation(qrCodeMessage);
    setTimeout(function () {
      location.href = '/siswa/statistik';
    }, 5000);
    isScanned = true;
  }
}
function submitFormWithLocation(qrCodeMessage) {
  var form = document.getElementById("form-submit");
  var nisInput = form.querySelector("input[name='nis']");
  var statusInput = form.querySelector("input[name='status']");
  var tokenInput = form.querySelector("input[name='_token']");
  var now = new Date();
  var inputQR = document.getElementById("inputQR");
  var qrCodeContent = inputQR.value;
  var formattedTime = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
  console.log("qrCodeMessage:", qrCodeMessage);
  console.log("NIS Akun Absensi:", nisInput.value);
  if (qrCodeMessage !== nisInput.value) {
    Swal.fire({
      icon: "error",
      title: "Gagal Absen!",
      text: "NIS QRCode tidak sesuai dengan NIS Akun Absensi",
      showConfirmButton: true,
      timer: 5000
    });
    return; // Hentikan proses absen jika NIS QRCode tidak sesuai
  }
  if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function (position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;
      var data = {
        nis: nisInput.value,
        lokasi_masuk: {
          latitude: latitude,
          longitude: longitude
        },
        jam_masuk: formattedTime,
        jam_keluar: null,
        status: statusInput.value
      };
      fetch(qrCodeContent, {
        method: "POST",
        headers: {
          "XSRF-TOKEN": tokenInput.value,
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": tokenInput.value
        },
        cache: "no-cache",
        redirect: "follow",
        credentials: "same-origin",
        body: JSON.stringify(data)
      }).then(function (response) {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        JSON.stringify(data);
      }).then(function (data) {
        Swal.fire({
          icon: "success",
          title: "Berhasil Absen!",
          showConfirmButton: true,
          timer: 5000
        });
      })["catch"](function (error) {
        console.error("Error:", error);
        Swal.fire({
          icon: "error",
          title: "Gagal Absen!",
          showConfirmButton: true,
          timer: 5000
        });
      });
    }, function (error) {
      Swal.fire({
        icon: "error",
        title: "Gagal mengambil lokasi!",
        showConfirmButton: true,
        timer: 5000
      });
    });
  } else {
    Swal.fire({
      icon: "error",
      title: "Gagal mengambil lokasi!",
      showConfirmButton: true,
      timer: 5000
    });
  }
}
function onScanError(errorMessage) {
  console.error("QR Code scan error:", errorMessage);
}
document.addEventListener("DOMContentLoaded", function () {
  // submitFormWithLocation();

  var scanNav = document.getElementById("scanNav");
  if (scanNav) {
    scanNav.addEventListener('click', toggleScan);
  }
});
window.addEventListener("beforeunload", stopScanner);
/******/ })()
;