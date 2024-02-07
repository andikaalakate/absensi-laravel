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
  !*** ./resources/assets/dashboard/js/checkLocation.js ***!
  \********************************************************/
__webpack_require__.r(__webpack_exports__);
document.addEventListener("DOMContentLoaded", function () {
  var allowedLatitude = 3.5930435906897427;
  var allowedLongitude = 98.7360079819932;
  var allowedRadius = 20;
  var timeout = 10000;
  function haversine(lat1, lon1, lat2, lon2) {
    var R = 6371e3;
    var φ1 = lat1 * Math.PI / 180;
    var φ2 = lat2 * Math.PI / 180;
    var Δφ = (lat2 - lat1) * Math.PI / 180;
    var Δλ = (lon2 - lon1) * Math.PI / 180;
    var a = Math.sin(Δφ / 2) * Math.sin(Δφ / 2) + Math.cos(φ1) * Math.cos(φ2) * Math.sin(Δλ / 2) * Math.sin(Δλ / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var distance = R * c;
    return distance;
  }
  function checkLocationPermission() {
    return new Promise(function (resolve, reject) {
      navigator.permissions.query({
        name: "geolocation"
      }).then(function (permissionStatus) {
        if (permissionStatus.state === "granted") {
          resolve();
        } else if (permissionStatus.state === "prompt") {
          Swal.fire({
            title: "Izin Lokasi",
            text: 'Untuk menggunakan fitur ini, kami memerlukan akses lokasi Anda. Klik "Izinkan" pada prompt izin lokasi yang muncul.',
            showCancelButton: true,
            confirmButtonText: "Izinkan",
            cancelButtonText: "Tidak Izinkan"
          }).then(function (result) {
            if (result.isConfirmed) {
              resolve();
            } else {
              reject(new Error("Permission denied"));
            }
          });
        } else {
          reject(new Error("Permission denied"));
        }
      });
    });
  }
  function checkLocation() {
    checkLocationPermission().then(function () {
      navigator.geolocation.getCurrentPosition(function (position) {
        var userLatitude = position.coords.latitude;
        var userLongitude = position.coords.longitude;
        var distance = haversine(userLatitude, userLongitude, allowedLatitude, allowedLongitude);
        if (distance > allowedRadius) {
          Swal.fire({
            icon: "error",
            title: "Akses Ditolak!",
            text: "Maaf, Anda berada di luar area yang diperbolehkan untuk mengakses halaman ini.",
            confirmButtonText: "OK"
          }).then(function () {
            history.back();
          });
        }
      }, function (error) {
        console.error("Gagal mendapatkan lokasi:", error);
        if (error.code === 1) {
          Swal.fire({
            icon: "error",
            title: "Akses Ditolak!",
            text: "Anda perlu mengizinkan akses lokasi untuk menggunakan fitur ini.",
            confirmButtonText: "OK"
          }).then(function () {
            checkLocationPermission();
            checkLocation();
            history.back();
          });
        }
      }, {
        timeout: timeout
      });
    })["catch"](function (error) {
      console.error("Permission denied:", error);
      Swal.fire({
        icon: "error",
        title: "Akses Ditolak!",
        text: "Anda perlu mengizinkan akses lokasi untuk menggunakan fitur ini.",
        confirmButtonText: "OK"
      }).then(function () {
        checkLocationPermission();
        checkLocation();
        history.back();
      });
    });
  }
  checkLocation();
});
/******/ })()
;