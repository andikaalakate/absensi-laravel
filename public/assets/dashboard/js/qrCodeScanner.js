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
  submitFormWithLocation();
}
function submitFormWithLocation() {
  var form = document.getElementById("form-submit");
  var nisInput = form.querySelector("input[name='nis']");
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;
      var data = {
        nis: nisInput.value,
        lokasi_masuk: latitude + "," + longitude
      };
      fetch(form.action, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
      }).then(function (response) {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      }).then(function (data) {
        console.log(data);
        Swal.fire({
          icon: "success",
          title: "Berhasil!",
          showConfirmButton: false,
          timer: 5000
        });
        stopScanner();
      })["catch"](function (error) {
        console.error('Error:', error);
        alert("Failed to submit form with location.");
      });
    }, function (error) {
      console.error("Error getting geolocation:", error);
      alert("Unable to retrieve current location.");
    });
  } else {
    alert("Geolocation is not supported by this browser.");
  }
}
function onScanError(errorMessage) {
  console.error("QR Code scan error:", errorMessage);
}
document.addEventListener("DOMContentLoaded", function () {
  var scanNav = document.getElementById("scanNav");
  if (scanNav) {
    scanNav.addEventListener('click', toggleScan);
  }
});
window.addEventListener("beforeunload", stopScanner);
/******/ })()
;