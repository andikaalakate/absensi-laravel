/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************************!*\
  !*** ./resources/assets/dashboard/js/main.js ***!
  \***********************************************/
function bukaTutupSidebar() {
  var sidebar = document.getElementById("container");
  var aside = document.getElementById("sidebar");
  var tandaPanah = document.getElementById("panah-sidebar");
  if (sidebar.style.gridTemplateColumns == "300px auto") {
    sidebar.style.gridTemplateColumns = "40px auto";
    tandaPanah.style.left = "30px";
    tandaPanah.style.transform = "rotate(0deg)";
    aside.style.width = "40px";
  } else {
    aside.style.width = "300px";
    sidebar.style.gridTemplateColumns = "300px auto";
    tandaPanah.style.left = "270px";
    tandaPanah.style.transform = "rotate(-180deg)";
  }
}
/******/ })()
;