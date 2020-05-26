<?php 
$First_Name = $_POST['First_Name'];
$Last_Name = $_POST['Last_Name'];
$Birthday_day = $_POST['Birthday_day'];
$Birthday_Month = $_POST['Birthday_Month'];
$Birthday_Year = $_POST['Birthday_Year'];
$Email_Id = $_POST['Email_Id'];
$Mobile_Number = $_POST['Mobile_Number'];
$Gender = $_POST['Gender'];
$Address = $_POST['Address'];
$City = $_POST['City'];
$Pin_Code = $_POST['Pin_Code'];
$State = $_POST['State'];
$Contry_Name = $_POST['Contry_Name'];
$ClassX_Board = $_POST['ClassX_Board'];
$ClassX_Percentage = $_POST['ClassX_Percentage'];
$ClassX_YrOfPassing = $_POST['ClassX_YrOfPassing'];
$ClassXII_Board = $_POST['ClassXII_Board'];
$ClassXII_Percentage = $_POST['ClassXII_Percentage'];
$ClassXII_YrOfPassing = $_POST['ClassXII_YrOfPassing'];
$Graduation_Board = $_POST['Graduation_Board'];
$Graduation_Percentage = $_POST['Graduation_Percentage'];
$Graduation_YrOfPassing = $_POST['Graduation_YrOfPassing'];
$Masters_Board = $_POST['Masters_Board'];
$Masters_Percentage = $_POST['Masters_Percentage'];
$Masters_YrOfPassing = $_POST['Masters_YrOfPassing'];
$Course = $_POST['Course'];

if(!empty($First_Name) || !empty($Last_Name) || !empty($Birthday_day) || !empty($ClassX_Board) || !empty($ClassX_Percentage) || !empty($ClassX_YrOfPassing) || !empty($ClassXII_Board) || !empty($ClassXII_Percentage) || !empty($ClassXII_YrOfPassing))
{
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbName = "pagedb";
$conn = new mysqli("$host", "$dbusername", "$dbpassword", "$dbName");
if (mysqli_connect_error())
{
	die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
}
else {
	$SELECT = "SELECT Email_Id From registration Where Email_Id = ? Limit 1";
	$INSERT = "INSERT Into registration (First_Name, Last_Name, Birthday_day, Birthday_Month, Birthday_Year, Email_Id, Mobile_Number, Gender, Address, City, Pin_Code, State, Contry_Name, ClassX_Board, ClassX_Percentage, ClassX_YrOfPassing, ClassXII_Board, ClassXII_Percentage, ClassXII_YrOfPassing, Graduation_Board, Graduation_Percentage, Graduation_YrOfPassing, Masters_Board, Masters_Percentage, Masters_YrOfPassing, Course) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum = $stmt->num_rows;

if($rnum==0) {
	$stmt = $conn->prepare($INSERT);
	$stmt->bind_param("ssiississsisssdisdisdisdis", $First_Name, $Last_Name, $Birthday_day, $Birthday_Month, $Birthday_Year, $Email_Id, $Mobile_Number, $Gender, $Address, $City, $Pin_Code, $State, $Contry_Name, $ClassX_Board, $ClassX_Percentage, $ClassX_YrOfPassing, $ClassXII_Board, $ClassXII_Percentage, $ClassXII_YrOfPassing, $Graduation_Board, $Graduation_Percentage, $Graduation_YrOfPassing, $Masters_Board, $Masters_Percentage, $Masters_YrOfPassing, $Course);
	$stmt->execute();
	echo "New record inserted Sucessfully";
} else {
	echo "Someone is already Registered using this Email";
}
$stmt->close();
$conn->close();
}
} else {
echo "This Field is Mandatory";
die();
} 
?>











