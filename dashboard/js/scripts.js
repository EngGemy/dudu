(function(window, undefined) {
  'use strict';

    function addList(event) {
        event.preventDefault();
        var listContainer = document.getElementById("listContainer");

        // Create a new list element
        var newList = document.createElement("div");
        newList.classList.add("list");

        // Create input element for list name
        var nameInput = document.createElement("input");
        nameInput.type = "text";
        nameInput.classList.add("list-name");
        nameInput.placeholder = "Enter list name";
        nameInput.name = "highlight_names[]";

        // Create unordered list for items
        var itemList = document.createElement("ul");
        itemList.classList.add("item-list");

        // Create a list item with input elements for name and value
        var listItem = document.createElement("li");
        var itemNameInput = document.createElement("input");
        itemNameInput.type = "text";
        itemNameInput.classList.add("item-name");
        itemNameInput.placeholder = "Enter item name";
        itemNameInput.name = "highlight_values[" + listContainer.childElementCount + "][]";

        listItem.appendChild(itemNameInput);
        var deleteButton = document.createElement("button");
        deleteButton.classList.add("delete-item");
        deleteButton.innerHTML = "Delete";

        // Append the delete button to the new item
        listItem.appendChild(deleteButton);

        // Attach event listener to the delete button
        deleteButton.addEventListener("click", deleteItem);

        itemList.appendChild(listItem);

        // Create buttons for adding items and deleting the list
        var addItemButton = document.createElement("button");
        addItemButton.classList.add("add-item");
        addItemButton.style="margin-right:10px !important";
        addItemButton.innerHTML = "Add Item";
        var deleteListButton = document.createElement("button");
        deleteListButton.classList.add("delete-list");
        deleteListButton.innerHTML = "Delete List";

        // Append all elements to the new list
        newList.appendChild(nameInput);
        newList.appendChild(itemList);
        newList.appendChild(addItemButton);
        newList.appendChild(deleteListButton);

        // Attach event listener to the add item button
        // addItemButton.addEventListener("click", addItem);

        // Attach event listener to the delete list button
        deleteListButton.addEventListener("click", deleteList);

        // Append the new list to the list container
        listContainer.appendChild(newList);
    }

    function addItem(event) {
        event.preventDefault();
        var itemList = event.target.parentNode.querySelector(".item-list");
        var bigTableRow = event.target.closest("div");
        var dd = Array.from(event.target.parentNode.parentNode.children).indexOf(bigTableRow);



        // var listIndex = event.target.parentNode.parentNode.children.length - 1;
        // if(listIndex < 0){
        //     listIndex=0;
        // }
        // alert(listIndex)
        // alert(listIndex)

        // Create a new list item with input elements for name and value
        var listItem = document.createElement("li");
        var itemNameInput = document.createElement("input");
        itemNameInput.type = "text";
        itemNameInput.classList.add("item-name");
        itemNameInput.placeholder = "Enter item name";
        itemNameInput.name = "highlight_values[" + dd + "][]";

        listItem.appendChild(itemNameInput);
        var deleteButton = document.createElement("button");
        deleteButton.classList.add("delete-item");
        deleteButton.innerHTML = "Delete";

        // Append the delete button to the new item
        listItem.appendChild(deleteButton);

        // Attach event listener to the delete button
        deleteButton.addEventListener("click", deleteItem);

        // Append the new item to the item list
        itemList.appendChild(listItem);
    }

    function deleteList(event) {
        event.preventDefault();
        var list = event.target.parentNode;
        var listContainer = document.getElementById("listContainer");
        listContainer.removeChild(list);
    }

    function deleteItem(event) {
        event.preventDefault();

        var item = event.target.parentNode;
        var itemList = item.parentNode;

        // Remove the item from the item list
        itemList.removeChild(item);
    }
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("delete-list")) {
            deleteList.call(event.target, event);
        }
    });
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("add-item")) {
            addItem.call(event.target, event);
        }
    });
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("delete-item")) {
            deleteItem.call(event.target, event);
        }
    });

// Attach event listener to the add list button
    var addListButton = document.getElementById("addList");
    addListButton.addEventListener("click", addList);

    // var addItemButton = document.getElementById("addItem");
    // addItemButton.addEventListener("click", addItem);
    //
    // var DeleteListButton = document.getElementById("deleteList");
    // DeleteListButton.addEventListener("click", deleteList);
    //
    // var DeleteItemButton = document.getElementById("deleteItem");
    // DeleteItemButton.addEventListener("click", deleteItem);

    $(document).ready(function() {
        var max_fields      = 10;
        var wrapper         = $(".container1");
        var add_button      = $(".add_form_field");

        var x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x++;
                $(wrapper).append('<div class="custom-inputs">' +
                    '<input type="text" class="form-control custom-2" name="features[]">' +
                    '<a href="#" class="delete_field"><i class="fas fa-trash"></i></a></div>'
                ); //add input box
            }
            else
            {
                alert('You Reached the limits')
            }
        });

        $(wrapper).on("click",".delete_field", function(e){
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });

    function addSmallRow(event) {
        event.preventDefault(); // Prevent form submission

        var smallTable = this.parentNode.querySelector(".small-table");
        var row = smallTable.querySelector("tbody").insertRow();
        var cell1 = row.insertCell();
        var cell2 = row.insertCell();
        var cell3 = row.insertCell();
        var cell4 = row.insertCell();
        var bigTableRow = this.closest("tr");

        var bigTableIndex = Array.from(bigTableRow.parentNode.children).indexOf(bigTableRow);
        var smallTableIndex = Array.from(bigTableRow.querySelectorAll(".small-table")).indexOf(smallTable);

        cell1.innerHTML = '<input type="text" name="small_title[' + bigTableIndex + '][]" />';
        cell2.innerHTML = '<input type="text" name="small_image[' + bigTableIndex + '][]" />';
        cell3.innerHTML = '<input type="text" name="small_description[' + bigTableIndex + '][]" />';
        cell4.innerHTML = '<button class="remove-row">Remove</button>';

        var removeButton = cell4.querySelector(".remove-row");
        removeButton.addEventListener("click", removeRow);
    }

// Function to remove a row
    function removeRow(event) {
        event.preventDefault(); // Prevent form submission

        var row = this.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

// Function to add a row to the big table
    function addBigRow(event) {
        event.preventDefault(); // Prevent form submission

        var table = document.getElementById("bigTable");
        var row = table.querySelector("tbody").insertRow();
        var cell1 = row.insertCell();
        var cell2 = row.insertCell();
        var cell3 = row.insertCell();
        var cell4 = row.insertCell();
        var cell5 = row.insertCell();
        cell1.innerHTML = '<input type="text" name="big_title[]"  required/>';
        cell2.innerHTML = '<input type="text" name="big_image[]" />';
        cell3.innerHTML = '<input type="text" name="big_description[]" />';
        cell4.innerHTML = '<table class="small-table">' +
            '<thead><tr><th>Small Title</th><th>Small Image</th><th>Small Description</th><th></th></tr></thead>' +
            '<tbody></tbody></table>' +
            '<button class="add-small-row">Add Small Row</button>';
        cell5.innerHTML += '<button class="remove-row">Remove</button>';

        var addSmallRowButton = cell4.querySelector(".add-small-row");
        addSmallRowButton.addEventListener("click", addSmallRow);

        var removeButton = row.querySelector(".remove-row");
        removeButton.addEventListener("click", removeRow);
    }


// Event listener for adding a big row
    document.getElementById("addBigRow").addEventListener("click", addBigRow);
    document.getElementById("addSmallRow").addEventListener("click", addSmallRow);
    document.getElementById("removeSmallRow").addEventListener("click", removeRow);
    document.getElementById("removeBigRow").addEventListener("click", removeRow);

  /*
  NOTE:
  ------
  PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
  WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */
///  Add Input
    $(document).ready(function(){
      var max_fileds = 10;
      var wrapper = $(".list");
      var add_button = $(".add_button");
      var x = 1;
      $(add_button).click(function(e){
        e.preventDefault();
        if(x < max_fileds){
          x++;
          $(wrapper).append('<div><input type="text" class="form-control" name="home_list_bottom[]" id="account-name" placeholder="" value=""><a href="Javascript:void(0)" class="btn btn-danger remove_filed"><i class="fa fa-minus"></i></a></div>')
        }

      });

      $(wrapper).on("click",".remove_filed", function(e){
        e.preventDefault();
        $(this).parent().remove();
        x--;

      });

    });


    $(document).ready(function(){
      var max_filed = 10;
      var wrapper = $(".lists");
      var add_button = $(".add_button1");
      var y = 1;
      $(add_button).click(function(e){
        e.preventDefault();
        if(y < max_filed){
          y++;
          $(wrapper).append('<div><input type="text" class="form-control" name="home_list[]" placeholder="" value=""><a href="Javascript:void(0)" class="btn btn-danger remove_filed"><i class="fa fa-minus"></i></a></div>')
        }

      });

      $(wrapper).on("click",".remove_filed", function(e){
        e.preventDefault();
        $(this).parent().remove();
        x--;

      });

    });



    $(document).ready(function(){
      var max_filed = 10;
      var wrapper = $(".wh_list");
      var add_button2 = $(".add_button2");
      var z = 1;
      $(add_button2).click(function(e){
        e.preventDefault();
        if(z < max_filed){
          z++;
          $(wrapper).append('<div><input type="text" class="form-control" name="who_list[]" placeholder="" value=""><a href="Javascript:void(0)" class="btn btn-danger remove_filed"><i class="fa fa-minus"></i></a></div>')
        }

      });

      $(wrapper).on("click",".remove_filed", function(e){
        e.preventDefault();
        $(this).parent().remove();
        x--;

      });

    });


    $(document).ready(function(){
      $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });




})(window);
const menu1 = document.querySelector('#menu-1');
if (menu1) {
    new Menu(menu1);
}





