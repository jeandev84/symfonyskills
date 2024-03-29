<!DOCTYPE html>
<html>
<head>
    <title>Transfer Rows Between Two HTML Table</title>
    <meta charset="windows-1252">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

        .container{overflow: hidden}
        .tab{float: left}
        .tab-btn{margin: 50px;}
        button{display:block;margin-bottom: 20px;}
        tr{transition:all .25s ease-in-out}
        tr:hover{background-color: #ddd;}

    </style>
</head>
<body>

<div class="container">

    <div class="tab">
        <table id="table1" border="1">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Select</th>
            </tr>
            <tr>
                <td>A1</td>
                <td>B1</td>
                <td>C1</td>
                <td><input type="checkbox" name="check-tab1"></td>
            </tr>
            <tr>
                <td>A2</td>
                <td>B2</td>
                <td>C2</td>
                <td><input type="checkbox" name="check-tab1"></td>
            </tr>
            <tr>
                <td>A3</td>
                <td>B3</td>
                <td>C3</td>
                <td><input type="checkbox" name="check-tab1"></td>
            </tr>
            <tr>
                <td>A4</td>
                <td>B4</td>
                <td>C4</td>
                <td><input type="checkbox" name="check-tab1"></td>
            </tr>
            <tr>
                <td>A5</td>
                <td>B5</td>
                <td>C5</td>
                <td><input type="checkbox" name="check-tab1"></td>
            </tr>
            <tr>
                <td>A6</td>
                <td>B6</td>
                <td>C6</td>
                <td><input type="checkbox" name="check-tab1"></td>
            </tr>
            <tr>
                <td>A7</td>
                <td>B7</td>
                <td>C7</td>
                <td><input type="checkbox" name="check-tab1"></td>
            </tr>
            <tr>
                <td>A8</td>
                <td>B8</td>
                <td>C8</td>
                <td><input type="checkbox" name="check-tab1"></td>
            </tr>
            <tr>
                <td>A9</td>
                <td>B9</td>
                <td>C9</td>
                <td><input type="checkbox" name="check-tab1"></td>
            </tr>
            <tr>
                <td>A10</td>
                <td>B10</td>
                <td>C10</td>
                <td><input type="checkbox" name="check-tab1"></td>
            </tr>
        </table>
    </div>

    <div class="tab tab-btn">
        <button onclick="tab1_To_tab2();">>>>>></button>
        <button onclick="tab2_To_tab1();"><<<<<</button>
    </div>

    <div class="tab">
        <table id="table2" border="1">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Select</th>
            </tr>
        </table>
    </div>
</div>

<script>

    function tab1_To_tab2()
    {
        var table1 = document.getElementById("table1"),
            table2 = document.getElementById("table2"),
            checkboxes = document.getElementsByName("check-tab1");
        console.log("Val1 = " + checkboxes.length);
        for(var i = 0; i < checkboxes.length; i++)
            if(checkboxes[i].checked)
            {
                // create new row and cells
                var newRow = table2.insertRow(table2.length),
                    cell1 = newRow.insertCell(0),
                    cell2 = newRow.insertCell(1),
                    cell3 = newRow.insertCell(2),
                    cell4 = newRow.insertCell(3);
                // add values to the cells
                cell1.innerHTML = table1.rows[i+1].cells[0].innerHTML;
                cell2.innerHTML = table1.rows[i+1].cells[1].innerHTML;
                cell3.innerHTML = table1.rows[i+1].cells[2].innerHTML;
                cell4.innerHTML = "<input type='checkbox' name='check-tab2'>";

                // remove the transfered rows from the first table [table1]
                var index = table1.rows[i+1].rowIndex;
                table1.deleteRow(index);
                // we have deleted some rows so the checkboxes.length have changed
                // so we have to decrement the value of i
                i--;
                console.log(checkboxes.length);
            }
    }


    function tab2_To_tab1()
    {
        var table1 = document.getElementById("table1"),
            table2 = document.getElementById("table2"),
            checkboxes = document.getElementsByName("check-tab2");
        console.log("Val1 = " + checkboxes.length);
        for(var i = 0; i < checkboxes.length; i++)
            if(checkboxes[i].checked)
            {
                // create new row and cells
                var newRow = table1.insertRow(table1.length),
                    cell1 = newRow.insertCell(0),
                    cell2 = newRow.insertCell(1),
                    cell3 = newRow.insertCell(2),
                    cell4 = newRow.insertCell(3);
                // add values to the cells
                cell1.innerHTML = table2.rows[i+1].cells[0].innerHTML;
                cell2.innerHTML = table2.rows[i+1].cells[1].innerHTML;
                cell3.innerHTML = table2.rows[i+1].cells[2].innerHTML;
                cell4.innerHTML = "<input type='checkbox' name='check-tab1'>";

                // remove the transfered rows from the second table [table2]
                var index = table2.rows[i+1].rowIndex;
                table2.deleteRow(index);
                // we have deleted some rows so the checkboxes.length have changed
                // so we have to decrement the value of i
                i--;
                console.log(checkboxes.length);
            }
    }

</script>

</body>
</html>