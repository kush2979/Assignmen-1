<?php
if(isset($_POST['ASC']))
{
    $asc_query = "SELECT * FROM registration ORDER BY id ASC";
    $result = executeQuery($asc_query);
}

elseif (isset ($_POST['DESC'])) 
    {
          $desc_query = "SELECT * FROM registrartion ORDER BY id DESC";
          $result = executeQuery($desc_query);
    }

 else {
        $default_query = "SELECT * FROM registrartion";
        $result = executeQuery($default_query);
}

function executeQuery($query)
{
    $connect = mysqli_connect("localhost", "root", "", "pagedb");
    $result = mysqli_query($connect, $query);
    return $result;
}

?>

<!DOCTYPE html>
<html>
<head>
<title> Data Extraction</title>
<style type="text/css">
table {
  border-collapse: collapse;
}

table, th, td {
  border: 2px solid #d96459;
}
table {
	border: 2px solid #d96459;
	width: 100%;
	color: black;
	font-family: minispace;
	font-size: 15px;
	text--align: center;
}
th, td {
  padding: 12px;
  text--align: center;
  
  
}
tr:nth-child(even) {background-color: #f2f2f2;}
th{
	background-color: black;
	color: white;
}
</style>
</head>
<body>

<form action="Database.php" method="post">
<input type ="submit" name="ASC" value="Assending">
<br>
<br>
<input type ="submit" name="DESC" value="Descending">
<br>
<br>


<input type="text" name="" id="myInput" placeholder="names..." onkeyup="searchFun()">
<table>
<tr>
<table id="myTable">
<tr class="header">
<th>id</th>
<th>First_Name</th>
<th>Last_Name</th>
<th>Birthday_day</th>
<th>Birthday_Month</th>
<th>Birthday_Year</th>
<th>Email_Id</th>
<th>pass</th>
<th>Mobile_Number</th>
<th>Gender</th>
<th>Address</th>
<th>City</th>
<th>Pin_Code</th>
<th>State</th>
<th>Contry_Name</th>
<th>ClassX_Board</th>
<th>ClassX_Percentage</th>
<th>ClassX_YrOfPassing</th>
<th>ClassXII_Board</th>
<th>ClassXII_Percentage</th>
<th>ClassXII_YrOfPassing</th>
<th>Graduation_Board</th>
<th>Graduation_Percentage</th>
<th>Graduation_YrOfPassing</th>
<th>Masters_Board</th>
<th>Masters_Percentage</th>
<th>Masters_YrOfPassing</th>
<th>Course</th>


<?php
$conn = mysqli_connect("localhost", "root", "", "pagedb");
if ($conn-> connect_error) {
die("Connection Failed:".$conn-> connect_error);
}


$sql = "SELECT id, First_Name, Last_Name, Birthday_day, Birthday_Month, Birthday_Year, Email_Id, pass, Mobile_Number, Gender, Address, City, Pin_Code, State, Contry_Name, ClassX_Board, ClassX_Percentage, ClassX_YrOfPassing, ClassXII_Board, ClassXII_Percentage, ClassXII_YrOfPassing, Graduation_Board, Graduation_Percentage, Graduation_YrOfPassing, Masters_Board, Masters_Percentage, Masters_YrOfPassing, Course from registration";
$result = $conn->query($sql);

if ($result->num_rows>0){
while ($row = $result-> fetch_assoc()) {
echo "<tr><td>". $row["id"] ."</td><td>". $row["First_Name"] ."</td><td>". $row["Last_Name"] ."</td><td>". $row["Birthday_day"] ."</td><td>". $row["Birthday_Month"] ."</td><td>". $row["Birthday_Year"] ."</td><td>". $row["Email_Id"] ."</td><td>". $row["pass"] ."</td><td>". $row["Mobile_Number"] ."</td><td>". $row["Gender"] ."</td><td>". $row["Address"] ."</td><td>". $row["City"] ."</td><td>". $row["Pin_Code"] ."</td><td>". $row["State"] ."</td><td>". $row["Contry_Name"] ."</td><td>". $row["ClassX_Board"] ."</td><td>". $row["ClassX_Percentage"] ."</td><td>". $row["ClassX_YrOfPassing"] ."</td><td>". $row["ClassXII_Board"] ."</td><td>". $row["ClassXII_Percentage"] ."</td><td>". $row["ClassXII_YrOfPassing"] ."</td><td>". $row["Graduation_Board"] ."</td><td>". $row["Graduation_Percentage"] ."</td><td>". $row["Graduation_YrOfPassing"] ."</td><td>". $row["Masters_Board"] ."</td><td>". $row["Masters_Percentage"] ."</td><td>". $row["Masters_YrOfPassing"] . $row["Course"] ."</td><td>";
}
echo "</table>";
}
else {
echo "0 result";
}

$conn-> close();
?>

</table>

<script>

function searchFun() {
	let filter = document.getElementById('myInput').value.toUpperCase();
	
	let myTable = document.getElementById('myTable');
	
	let tr = myTable.getElementsByTagName('tr');
	
	for(var i=0; i<tr.length; i++){
		 let td = tr[i].getElementsByTagName('td')[1];
		  if(td){
			 let textvalue = td.textContent || td.innerHTML;
			 
			 if(textvalue.toUpperCase().indexOf(filter) > -1){
				  tr[i].style.display = "";
			 } else{
				 tr[i].style.display = "none";
			 }
		  }
	} 
}


</script>    
</form>
</body>
</html>