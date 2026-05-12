function addSmallRow(event) {
    event.preventDefault();

    var smallTable = this.parentNode.querySelector(".small-table");
    var row = smallTable.querySelector("tbody").insertRow();
    var cell1 = row.insertCell();
    var cell2 = row.insertCell();
    var cell3 = row.insertCell();
    var cell4 = row.insertCell();

    var bigTableRow = this.closest("tr");

    var bigTableIndex = Array.from(bigTableRow.parentNode.children).indexOf(bigTableRow);
    var smallTableIndex = Array.from(bigTableRow.querySelectorAll(".small-table")).indexOf(smallTable);

    cell1.innerHTML = '<input class="form-control" type="text" name="small_title[' + bigTableIndex + '][]" required/>';
    cell2.innerHTML = '<input class="form-control" type="file" name="small_image[' + bigTableIndex + '][]" />';
    cell3.innerHTML = '<textarea class="form-control" name="small_description[' + bigTableIndex + '][]" ></textarea>';
    cell4.innerHTML = '<button class="remove-row">Remove</button>';

    var removeButton = cell4.querySelector(".remove-row");
    removeButton.addEventListener("click", removeRow);
}

function removeRow(event) {
    event.preventDefault();

    var row = this.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

function addBigRow(event) {
    event.preventDefault();

    var table = document.getElementById("bigTable");
    var row = table.querySelector("tbody").insertRow();
    var cell1 = row.insertCell();
    var cell2 = row.insertCell();
    var cell3 = row.insertCell();
    var cell4 = row.insertCell();
    var cell5 = row.insertCell();
    var cell6 = row.insertCell();
    cell1.innerHTML = '<input class="form-control" type="text" name="big_title[]" required/>';
    cell2.innerHTML = '<input class="form-control" type="text" name="big_content[]" required/>';
    cell3.innerHTML = '<input class="form-control" type="file" name="big_image[]" />';
    cell4.innerHTML = '<textarea class="form-control" name="big_description[]" ></textarea>';
    cell5.innerHTML = '<table class="small-table">' +
        '<thead><tr><th> Title</th><th> Image</th><th> Description</th><th></th></tr></thead>' +
        '<tbody></tbody></table>' +
        '<button class="add-small-row">Add Small Row</button>';
    cell6.innerHTML += '<button class="remove-row">Remove</button>';

    var addSmallRowButton = cell5.querySelector(".add-small-row");

    // addSmallRowButton.addEventListener("click", addSmallRow);

    var removeButton = row.querySelector(".remove-row");
    removeButton.addEventListener("click", removeRow);
}

document.getElementById("addBigRow").addEventListener("click", addBigRow);

document.addEventListener("click", function (event) {
    if (event.target.classList.contains("add-small-row")) {
        addSmallRow.call(event.target, event);
    }
});

document.addEventListener("click", function (event) {
    if (event.target.classList.contains("remove-row")) {
        removeRow.call(event.target, event);
    }
});
