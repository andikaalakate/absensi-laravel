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

function dropdownSetting() {
    if (document.getElementById("dropdownSetting").style.height == "40px") {
        document.getElementById("dropdownSetting").style.height = "auto";
    } else {
        document.getElementById("dropdownSetting").style.height = "40px";
    }
}
