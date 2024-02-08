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
        var rows = tabel.querySelectorAll('.table-data-kelas tr');
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
