/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/dashboard/css/leaderboard.css":
/*!********************************************************!*\
  !*** ./resources/assets/dashboard/css/leaderboard.css ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/dashboard/css/profilSiswa.css":
/*!********************************************************!*\
  !*** ./resources/assets/dashboard/css/profilSiswa.css ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/dashboard/css/statistik.css":
/*!******************************************************!*\
  !*** ./resources/assets/dashboard/css/statistik.css ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/dashboard/css/scan-qr.css":
/*!****************************************************!*\
  !*** ./resources/assets/dashboard/css/scan-qr.css ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/dashboard/css/tentang.css":
/*!****************************************************!*\
  !*** ./resources/assets/dashboard/css/tentang.css ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/tailwind.css":
/*!************************************!*\
  !*** ./resources/css/tailwind.css ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/login/css/style.css":
/*!**********************************************!*\
  !*** ./resources/assets/login/css/style.css ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/dashboard/css/style.css":
/*!**************************************************!*\
  !*** ./resources/assets/dashboard/css/style.css ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/dashboard/css/keamanan.css":
/*!*****************************************************!*\
  !*** ./resources/assets/dashboard/css/keamanan.css ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/login/js/main.js":
/*!*******************************************!*\
  !*** ./resources/assets/login/js/main.js ***!
  \*******************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
var alertShown = false; // Variabel penanda apakah alert telah ditampilkan

document.getElementById('nis').addEventListener('input', function (event) {
  // Memeriksa apakah input adalah angka
  if (!/^\d*$/.test(event.target.value)) {
    // Jika bukan angka dan alert belum ditampilkan, tampilkan toast alert
    if (!alertShown) {
      showToastAlert("Input tidak valid !");
      alertShown = true; // Set alertShown menjadi true agar alert hanya muncul sekali
      setTimeout(function () {
        alertShown = false; // Setelah 3 detik, reset alertShown sehingga alert dapat muncul lagi
      }, 3000);
    }
    // Menghapus karakter selain angka dari input
    event.target.value = event.target.value.replace(/[^\d]/g, '');
  } else {
    alertShown = false; // Reset alertShown jika input valid
  }
});
function showToastAlert(message) {
  Toastify({
    text: message,
    duration: 3000,
    gravity: "top",
    // Posisi toast alert, bisa diganti dengan "bottom"
    position: 'left',
    // Posisi toast alert, bisa diganti dengan "right"
    backgroundColor: "#0099ff",
    stopOnFocus: true // Menghentikan durasi toast saat fokus ke input
  }).showToast();
}

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/assets/login/js/main": 0,
/******/ 			"assets/dashboard/css/style": 0,
/******/ 			"assets/login/css/style": 0,
/******/ 			"assets/dashboard/css/keamanan": 0,
/******/ 			"css/tailwind": 0,
/******/ 			"css/app": 0,
/******/ 			"assets/dashboard/css/tentang": 0,
/******/ 			"assets/dashboard/css/scan-qr": 0,
/******/ 			"assets/dashboard/css/statistik": 0,
/******/ 			"assets/dashboard/css/profilSiswa": 0,
/******/ 			"assets/dashboard/css/leaderboard": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkabsensi_laravel"] = self["webpackChunkabsensi_laravel"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["assets/dashboard/css/style","assets/login/css/style","assets/dashboard/css/keamanan","css/tailwind","css/app","assets/dashboard/css/tentang","assets/dashboard/css/scan-qr","assets/dashboard/css/statistik","assets/dashboard/css/profilSiswa","assets/dashboard/css/leaderboard"], () => (__webpack_require__("./resources/assets/login/js/main.js")))
/******/ 	__webpack_require__.O(undefined, ["assets/dashboard/css/style","assets/login/css/style","assets/dashboard/css/keamanan","css/tailwind","css/app","assets/dashboard/css/tentang","assets/dashboard/css/scan-qr","assets/dashboard/css/statistik","assets/dashboard/css/profilSiswa","assets/dashboard/css/leaderboard"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/dashboard/css/style","assets/login/css/style","assets/dashboard/css/keamanan","css/tailwind","css/app","assets/dashboard/css/tentang","assets/dashboard/css/scan-qr","assets/dashboard/css/statistik","assets/dashboard/css/profilSiswa","assets/dashboard/css/leaderboard"], () => (__webpack_require__("./resources/css/tailwind.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/dashboard/css/style","assets/login/css/style","assets/dashboard/css/keamanan","css/tailwind","css/app","assets/dashboard/css/tentang","assets/dashboard/css/scan-qr","assets/dashboard/css/statistik","assets/dashboard/css/profilSiswa","assets/dashboard/css/leaderboard"], () => (__webpack_require__("./resources/assets/login/css/style.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/dashboard/css/style","assets/login/css/style","assets/dashboard/css/keamanan","css/tailwind","css/app","assets/dashboard/css/tentang","assets/dashboard/css/scan-qr","assets/dashboard/css/statistik","assets/dashboard/css/profilSiswa","assets/dashboard/css/leaderboard"], () => (__webpack_require__("./resources/assets/dashboard/css/style.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/dashboard/css/style","assets/login/css/style","assets/dashboard/css/keamanan","css/tailwind","css/app","assets/dashboard/css/tentang","assets/dashboard/css/scan-qr","assets/dashboard/css/statistik","assets/dashboard/css/profilSiswa","assets/dashboard/css/leaderboard"], () => (__webpack_require__("./resources/assets/dashboard/css/keamanan.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/dashboard/css/style","assets/login/css/style","assets/dashboard/css/keamanan","css/tailwind","css/app","assets/dashboard/css/tentang","assets/dashboard/css/scan-qr","assets/dashboard/css/statistik","assets/dashboard/css/profilSiswa","assets/dashboard/css/leaderboard"], () => (__webpack_require__("./resources/assets/dashboard/css/leaderboard.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/dashboard/css/style","assets/login/css/style","assets/dashboard/css/keamanan","css/tailwind","css/app","assets/dashboard/css/tentang","assets/dashboard/css/scan-qr","assets/dashboard/css/statistik","assets/dashboard/css/profilSiswa","assets/dashboard/css/leaderboard"], () => (__webpack_require__("./resources/assets/dashboard/css/profilSiswa.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/dashboard/css/style","assets/login/css/style","assets/dashboard/css/keamanan","css/tailwind","css/app","assets/dashboard/css/tentang","assets/dashboard/css/scan-qr","assets/dashboard/css/statistik","assets/dashboard/css/profilSiswa","assets/dashboard/css/leaderboard"], () => (__webpack_require__("./resources/assets/dashboard/css/statistik.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/dashboard/css/style","assets/login/css/style","assets/dashboard/css/keamanan","css/tailwind","css/app","assets/dashboard/css/tentang","assets/dashboard/css/scan-qr","assets/dashboard/css/statistik","assets/dashboard/css/profilSiswa","assets/dashboard/css/leaderboard"], () => (__webpack_require__("./resources/assets/dashboard/css/scan-qr.css")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["assets/dashboard/css/style","assets/login/css/style","assets/dashboard/css/keamanan","css/tailwind","css/app","assets/dashboard/css/tentang","assets/dashboard/css/scan-qr","assets/dashboard/css/statistik","assets/dashboard/css/profilSiswa","assets/dashboard/css/leaderboard"], () => (__webpack_require__("./resources/assets/dashboard/css/tentang.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;