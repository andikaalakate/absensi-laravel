"use strict";
self["webpackHotUpdateabsensi_laravel"]("/assets/dashboard/js/main",{

/***/ "./resources/assets/dashboard/js/main.js":
/*!***********************************************!*\
  !*** ./resources/assets/dashboard/js/main.js ***!
  \***********************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
var bukaTutupSidebar = document.getElementById("bukaTutupSidebar");
if (bukaTutupSidebar) {
  bukaTutupSidebar.addEventListener("click", bukaSidebar);
}
function bukaSidebar() {
  var sidebar = document.getElementById("container");
  var aside = document.getElementById("sidebar");
  var tandaPanah = document.getElementById("panah-sidebar");
  var dashContent = document.getElementById("dashContent");
  if (sidebar.style.gridTemplateColumns == "300px auto") {
    bukaTutupSidebar.style.width = "40px";
    sidebar.style.gridTemplateColumns = "40px auto";
    tandaPanah.style.transform = "rotate(0deg)";
    aside.style.width = "40px";
    dashContent.style.maxWidth = "calc(100% - 70px)";
  } else {
    aside.style.width = "300px";
    dashContent.style.maxWidth = "calc(100% - 330px)";
    bukaTutupSidebar.style.width = "300px";
    sidebar.style.gridTemplateColumns = "300px auto";
    tandaPanah.style.transform = "rotate(-180deg)";
  }
}
function dropdownSetting() {
  if (document.getElementById("dropdownSetting").style.height == "40px") {
    document.getElementById("dropdownSetting").style.height = "auto";
  } else {
    document.getElementById("dropdownSetting").style.height = "40px";
  }
}

/***/ })

},
/******/ function(__webpack_require__) { // webpackRuntimeModules
/******/ /* webpack/runtime/getFullHash */
/******/ (() => {
/******/ 	__webpack_require__.h = () => ("188e05b62b79ba64")
/******/ })();
/******/ 
/******/ }
);