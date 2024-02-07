let noHp = document.getElementById("noHp");
if (noHp) {
    noHp.addEventListener("input", validateNumberInput);
}
function validateNumberInput() {
    noHp.value = noHp.value.replace(/\D/g, "");
}

window.addEventListener("load", function () {
    let preload = document.getElementById("preload");

    preload.style.opacity = "0";
    preload.style.zIndex = "-9999";
    document.body.style.overflow = "visible";
});

let bukaTutupSidebar = document.getElementById("bukaTutupSidebar");
if (bukaTutupSidebar) {
    bukaTutupSidebar.addEventListener("click", bukaSidebar);
}
function bukaSidebar() {
    let sidebar = document.getElementById("container");
    let aside = document.getElementById("sidebar");
    let tandaPanah = document.getElementById("panah-sidebar");
    let dashContent = document.getElementById("dashContent");

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

let dropdownMenu = document.getElementById("dropdownSetting");
if (dropdownMenu) {
    dropdownMenu.addEventListener("click", dropdownSetting);
}
function dropdownSetting() {
    if (document.getElementById("dropdownSetting").style.height == "40px") {
        document.getElementById("dropdownSetting").style.height = "auto";
    } else {
        document.getElementById("dropdownSetting").style.height = "40px";
    }
}

// script.js
var currentPage = 1;
var rowsPerPage = 10;
var tableRows = document.querySelectorAll(".tabel-data tbody tr");

let prevBtn = document.getElementById("prevBtn");
if (prevBtn) {
    prevBtn.addEventListener("click", changePage(-1));
}
let nextBtn = document.getElementById("nextBtn");
if (nextBtn) {
    nextBtn.addEventListener("click", changePage(1));
}

function showPage(page) {
    var startIndex = (page - 1) * rowsPerPage;
    var endIndex = startIndex + rowsPerPage;

    tableRows.forEach(function (row, index) {
        if (index >= startIndex && index < endIndex) {
            row.style.display = "table-row";
        } else {
            row.style.display = "none";
        }
    });
}

function changePage(delta) {
    currentPage += delta;
    if (currentPage < 1) {
        currentPage = 1;
    }
    var totalPages = Math.ceil(tableRows.length / rowsPerPage);
    if (currentPage > totalPages) {
        currentPage = totalPages;
    }

    showPage(currentPage);
}

showPage(currentPage);
let submitButton = document.getElementById("submitButton");
if (submitButton) {
    submitButton.addEventListener("click", showConfirmation);
}
// simpan perubahan
function showConfirmation() {
    document.getElementById("overlay").style.display = "flex";
    document.getElementById("confirmationPopup").style.display = "flex";
}

let cancelButton = document.getElementById("cancelButton");
if (cancelButton) {
    cancelButton.addEventListener("click", hideConfirmation);
}
function hideConfirmation() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("confirmationPopup").style.display = "none";
}

let confirmButton = document.getElementById("confirmButton");
if (confirmButton) {
    confirmButton.addEventListener("click", saveChanges);
}
function saveChanges() {
    Swal.fire({
        title: "Perubahan Disimpan!",
        icon: "success",
        timer: 3000,
    });
    hideConfirmation();
}
