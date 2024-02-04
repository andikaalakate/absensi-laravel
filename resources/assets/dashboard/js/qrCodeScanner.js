let scanNav = document.getElementById("scanNav");
if (scanNav) {
  scanNav.addEventListener('click', toggleScan)
}
function toggleScan() {
    let reader = document.getElementById("qrCodeReader");
    let qrcodeContainer = document.getElementById("qrcodeContainer");

    if (reader.style.display === "none") {
        reader.style.display = "block";
        qrcodeContainer.style.display = "none";
    } else {
        reader.style.display = "none";
        qrcodeContainer.style.display = "block";
    }
}
