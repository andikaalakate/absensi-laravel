// Fungsi Search pada Jurusan
function handleSearch() {
    search();
}

function search() {
    var input, filter, tabels, i, j, txtValue;
    input = document.getElementById("cari");
    filter = input.value.toUpperCase();
    tabels = document.querySelectorAll('.tabel');

    tabels.forEach(function (tabel) {
        var rows = tabel.querySelectorAll('.table-data-user tr');
        var tabelMatch = false;

        for (i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var rowMatch = false;

            for (j = 0; j < cells.length; j++) {
                txtValue = cells[j].textContent || cells[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    rowMatch = true;
                    tabelMatch = true;
                    break;
                }
            }
        }

        if (tabelMatch) {
            tabel.style.display = "block";
        } else {
            tabel.style.display = "none";
        }
    });
}

document.getElementById("cari").addEventListener("keyup", function (event) {

    if (event.key === "Enter") {
        handleSearch();
    } else {
        search();
    }
});

document.getElementById("noButton").addEventListener("click", function () {
    var confirmElement = document.getElementById("confirm");

    confirmElement.classList.remove("aktif");
});

// Fungsi input Nama
var alertShown = false;

var namaInputs = document.querySelectorAll('[id^="namaKajur"]');
namaInputs.forEach(function (input) {
    input.addEventListener('input', function (event) {
        if (!/^[a-zA-Z\s\.']+$/g.test(event.target.value)) {
            if (!alertShown) {
                showToastAlert("Input tidak valid!");
                alertShown = true;
                setTimeout(function () {
                    alertShown = false;
                }, 3000);
            }
            event.target.value = event.target.value.replace(/[^a-zA-Z\s\.']/g, '');
        } else {
            alertShown = false;
        }
    });
});

function showToastAlert(message) {
    Toastify({
        text: message,
        duration: 3000,
        gravity: "top",
        position: 'right',
        backgroundColor: "#0099ff",
        stopOnFocus: true
    }).showToast();
}

document.addEventListener("DOMContentLoaded", function () {
    var passwordInputs = document.querySelectorAll(".passwordInput");
    passwordInputs.forEach(function (input) {
        var password = input.value;

        // Pastikan panjang password adalah 8 karakter
        if (password.length < 8) {
            password = password.padEnd(8, "0"); // Jika kurang dari 8 karakter, tambahkan '0' di akhir hingga panjangnya menjadi 8 karakter
        } else if (password.length > 8) {
            password = password.slice(0, 8); // Jika lebih dari 8 karakter, potong menjadi 8 karakter
        }

        input.value = password;
    });
});

// Fungsi untuk membuka modal edit
var editButtons = document.querySelectorAll("#editButton");

editButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        var modalElement = document.getElementById("editModal");
        var id = button.getAttribute("data-id");
        var nama = button.getAttribute("data-nama");
        var username = button.getAttribute("data-username");
        var email = button.getAttribute("data-email");
        var notelp = button.getAttribute("data-notelp");
        var role = button.getAttribute("data-role");
        var password = button.getAttribute("data-password");

        if (password.length < 8) {
            password = password.padEnd(8, "0");
        } else if (password.length > 8) {
            password = password.slice(0, 8);
        }
        document.getElementById("id1").value = id;
        document.getElementById("nama1").value = nama;
        document.getElementById("username1").value = username;
        document.getElementById("email1").value = email;
        document.getElementById("notelp1").value = notelp;
        document.getElementById("role1").value = role;
        document.getElementById("password1").value = password;

        document.getElementById(
            "form-update-user"
        ).action = `/admin/user/update/${id}`;

        modalElement.style.display = "block";
    });
});

document.getElementById("closeButton").addEventListener("click", function () {
    var modalElement = document.getElementById("editModal");

    modalElement.style.display = "none";
});

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
}