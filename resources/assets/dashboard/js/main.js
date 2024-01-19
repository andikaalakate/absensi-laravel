function bukaTutupSidebar() {
    let sidebar = document.getElementById("container");
    let aside = document.getElementById("sidebar");
    let tandaPanah = document.getElementById("panah-sidebar")

    if(sidebar.style.gridTemplateColumns == "300px auto") {
        sidebar.style.gridTemplateColumns = "40px auto";
        tandaPanah.style.left = "30px";
        tandaPanah.style.transform = "rotate(0deg)";
        aside.style.width = "40px"
    } else {
        aside.style.width = "300px"
        sidebar.style.gridTemplateColumns = "300px auto";
        tandaPanah.style.left = "270px";
        tandaPanah.style.transform = "rotate(-180deg)";
    }
}
