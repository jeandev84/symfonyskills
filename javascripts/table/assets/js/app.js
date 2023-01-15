/**
 * Add HTML Table Row
*/

function addHTMLTableRow() {

    // get the table by id
    // create a new row and cells
    // get value from input text
    // set the value into row cell's
    let table = document.getElementById("table"),
        newRow    = table.insertRow(table.length),
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
}