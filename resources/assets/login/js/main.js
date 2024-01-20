let nis = document.getElementById("nis");
if (nis) {
    nis.addEventListener("input", validateNumberInput);
};
function validateNumberInput() {
    nis.value = nis.value.replace(/\D/g, '');
};
