<!DOCTYPE html>
<html>
<style type="text/css">
    .a_hide{
      display: none !important;
    }
    
    @media print
      {     
          .no-print, .no-print *
          {
              display: none !important;
          }
          .tblh td{
              border-top:none;
          }
          .print_en{
            text-align: center;
            display: block !important;
          }
          .tbl{
            width: 70%;
          }
          table{
            width:100% !important;
          }
		  
      }

    </style>
	<style type="text/css" media="screen">
.myMainContent{
    padding:20px 5px;
}

</style>
	<script language="javascript">
    function printdiv(printpage)
    {
    var headstr = "<html><head><title>Prescription</title></head><body>";
    var footstr = "</body>";
    var newstr = document.all.item(printpage).innerHTML;
    var oldstr = document.body.innerHTML;
    document.body.innerHTML = newstr+footstr;
    window.print();
    document.body.innerHTML = oldstr;
    return ;
    }
  </script>
    <head>
        <title>Generate prescription</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        
        <style>
            
            .container{overflow: hidden}
            .tab{float: left;}
            .tab-2{margin-left: 250px}
            .tab-2 input{display: block;margin-bottom: 20px}
            tr{transition:all .25s ease-in-out}
            tr:hover{background-color:#EEE;cursor: pointer}
            
        </style>
        
    </head>
    <body>  
        <div class="container">
		<div class="myMainContent"  id="div_print">
			
  <h2>Prescription</h2>
  <form class="form-inline" method="POST">
    <div class="form-group">
      <label for="patient_name">Patient Name:</label>
      <input type="patient_name" class="form-control" id="patient_name" name="patient_name" value="<?php if(isset($_POST['patient_name'])){ echo $_POST['patient_name'];}?>">
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="age" class="form-control" id="age" name="age" value="<?php if(isset($_POST['age'])){ echo $_POST['age'];}?>">
    </div> 	
	<div class="form-group">
      <label for="date">Date:</label>
      <input type="date" class="form-control" id="date"  name="date" value="<?php if(isset($_POST['date'])){ echo $_POST['date'];}?>">
    
	</div>
	
	<input type="submit">
	 

 
  </form>


  
            <div class="tab tab-1">
			
                <table id="table" border="3">
                    <tr>
                        <th>SL NO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <th>Medicine Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <th>Morning &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<th>Day &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<th>Night &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                  
                  
                </table>
				
            </div>
			</div>
            <div class="tab tab-2">
                SL NO :<input type="number" name="sno" id="sno">
                Medicine Name :<input type="text" name="mname" id="mname">
				Morning :<br>
				
      <select id="morning" name="morning">
        <option value="0">0</option>
		<option value="1">1</option>
      </select><br><br>
    
                
				Day :<br>
				<select id="day" name="day">
        <option value="0">0</option>
		<option value="1">1</option>
      </select><br><br>
				Night :<br>
				<select id="night" name="night">
        <option value="0">0</option>
		<option value="1">1</option>
      </select><br><br>
                
                <button onclick="addHtmlTableRow();">Add</button>
          
            </div>
        </div>
		<?php include("print.php");?>
        </div>
        <script>
            
            var rIndex,
                table = document.getElementById("table");
            
            // check the empty input
            function checkEmptyInput()
            {
                var isEmpty = false,
                    sno = document.getElementById("sno").value,
                    mname = document.getElementById("mname").value,
                    morning = document.getElementById("morning").value;
					day = document.getElementById("day").value;
					night = document.getElementById("night").value;
            
                if(sno === ""){
                    alert("Seria Number Connot Be Empty");
                    isEmpty = true;
                }
                else if(mname === ""){
                    alert("Medicine Name Connot Be Empty");
                    isEmpty = true;
                }
                else if(morning === ""){
                    alert("Put 0 or 1");
                    isEmpty = true;
                }
				else if(day === ""){
                    alert("Put 0 or 1");
                    isEmpty = true;
                }
				else if(night === ""){
                    alert("Put 0 or 1");
                    isEmpty = true;
                }
                return isEmpty;
            }
            
            // add Row
            function addHtmlTableRow()
            {
                // get the table by id
                // create a new row and cells
                // get value from input text
                // set the values into row cell's
                if(!checkEmptyInput()){
                var newRow = table.insertRow(table.length),
                    cell1 = newRow.insertCell(0),
                    cell2 = newRow.insertCell(1),
                    cell3 = newRow.insertCell(2),
					cell4 = newRow.insertCell(3),
					cell5 = newRow.insertCell(4),
                    sno = document.getElementById("sno").value,
                    mname = document.getElementById("mname").value,
                    morning = document.getElementById("morning").value;
					day = document.getElementById("day").value;
					night = document.getElementById("night").value;
            
                cell1.innerHTML = sno ;
                cell2.innerHTML = mname;
                cell3.innerHTML = morning;
				cell4.innerHTML = day;
				cell5.innerHTML = night;
                // call the function to set the event to the new row
                selectedRowToInput();
            }
            }
            
            // display selected row data into input text
            function selectedRowToInput()
            {
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                      // get the seected row index
                      rIndex = this.rowIndex;
                      document.getElementById("sno ").value = this.cells[0].innerHTML;
                      document.getElementById("mname").value = this.cells[1].innerHTML;
                      document.getElementById("morning").value = this.cells[2].innerHTML;
					  document.getElementById("day").value = this.cells[3].innerHTML;
					  document.getElementById("night").value = this.cells[4].innerHTML;
                    };
                }
            }
            selectedRowToInput();
            
           
        </script>
        
    </body>
</html>

