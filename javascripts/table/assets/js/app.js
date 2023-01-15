/**
 * Add HTML Table Row
*/

let rowIndexed, table = document.getElementById("table");


function checkEmptyInput() {
   let isEmpty = false;
   let firstname = document.getElementById('firstname').value;
   let lastname  = document.getElementById('lastname').value;
   let age       = document.getElementById('age').value;

   if (firstname === "") {
       alert("First Name Cannot Be Empty")
       isEmpty = true;
   } else if (lastname === "") {
       alert("Last Name Cannot Be Empty")
       isEmpty = true;
   } else if(age === "") {
       alert("Age Cannot Be Empty")
       isEmpty = true;
   }

   return isEmpty;
}

function addHTMLTableRow() {

    // get the table by id
    // create a new row and cells
    // get value from input text
    // set the value into row cell's

    if (! checkEmptyInput()) {

        let newRow    = table.insertRow(table.length),
            cell1     = newRow.insertCell(0),
            cell2     = newRow.insertCell(1),
            cell3     = newRow.insertCell(2);

        let firstname = document.getElementById('firstname').value;
        let lastname  = document.getElementById('lastname').value;
        let age       = document.getElementById('age').value;

        console.log(firstname, lastname, age);
        cell1.innerHTML = firstname;
        cell2.innerHTML = lastname;
        cell3.innerHTML = age;


        // call the function to set the event to new row
        selectedRowToInput();
    }

}



// Display selected row data into input text
function selectedRowToInput() {

    for (let i = 1; i < table.rows.length; i++) {
         table.rows[i].onclick = function () {
             // get the selected row
             rowIndexed = this.rowIndex;
             //console.log(rowIndexed);
             // console.log(this);

             document.getElementById('firstname').value = this.cells[0].innerHTML;
             document.getElementById('lastname').value  = this.cells[1].innerHTML;
             document.getElementById('age').value       = this.cells[2].innerHTML;
         }
    }
}

selectedRowToInput();


function editHtmlTableSelectedRow() {
    let firstname = document.getElementById('firstname').value;
    let lastname  = document.getElementById('lastname').value;
    let age       = document.getElementById('age').value;

    table.rows[rowIndexed].cells[0].innerHTML = firstname;
    table.rows[rowIndexed].cells[1].innerHTML = lastname;
    table.rows[rowIndexed].cells[2].innerHTML = age;
}



function removeSelectedRow() {
    // if (rowIndexed >= 0) {
    //     table.deleteRow(rowIndexed);
    // }

    table.deleteRow(rowIndexed);

    // clear input text
    document.getElementById('firstname').value = "";
    document.getElementById('lastname').value   = "";
    document.getElementById('age').value        = "";
}