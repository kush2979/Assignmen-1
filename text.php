<?php 
$First_Name = $_POST['First_Name'];
$Last_Name = $_POST['Last_Name'];
$Birthday_day = $_POST['Birthday_day'];
$Birthday_Month = $_POST['Birthday_Month'];
$Birthday_Year = $_POST['Birthday_Year'];
$Email_Id = $_POST['Email_Id'];
$pass = $_POST['pass'];
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

if(!empty($First_Name) || !empty($Last_Name) || !empty($Birthday_day) || !empty($Email_Id) || !empty($ClassX_Board) || !empty($ClassX_Percentage) || !empty($ClassX_YrOfPassing) || !empty($ClassXII_Board) || !empty($ClassXII_Percentage) || !empty($ClassXII_YrOfPassing))
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
	$INSERT = "INSERT Into registration (First_Name, Last_Name, Birthday_day, Birthday_Month, Birthday_Year, Email_Id, pass, Mobile_Number, Gender, Address, City, Pin_Code, State, Contry_Name, ClassX_Board, ClassX_Percentage, ClassX_YrOfPassing, ClassXII_Board, ClassXII_Percentage, ClassXII_YrOfPassing, Graduation_Board, Graduation_Percentage, Graduation_YrOfPassing, Masters_Board, Masters_Percentage, Masters_YrOfPassing, Course) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum = $stmt->num_rows;

if($rnum==0) {
	$stmt = $conn->prepare($INSERT);
	$stmt->bind_param("ssisississsisssdisdisdisdis", $First_Name, $Last_Name, $Birthday_day, $Birthday_Month, $Birthday_Year, $Email_Id, $pass, $Mobile_Number, $Gender, $Address, $City, $Pin_Code, $State, $Contry_Name, $ClassX_Board, $ClassX_Percentage, $ClassX_YrOfPassing, $ClassXII_Board, $ClassXII_Percentage, $ClassXII_YrOfPassing, $Graduation_Board, $Graduation_Percentage, $Graduation_YrOfPassing, $Masters_Board, $Masters_Percentage, $Masters_YrOfPassing, $Course);
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




<?php
$host = "localhost";
$db_name = "pagedb";
$username = "root";
$password = "";
 
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}catch(PDOException $exception){ 
    echo "Connection error: " . $exception->getMessage();
}
?>
		
<?php

if($_POST){
 
    $email = isset($_POST['Email_Id']) ? $_POST['Email_Id'] : "";
 
    if(empty($Email_Id)){
        echo "<div>Email cannot be empty.</div>";
    }

    else if(!filter_var($Email_Id, FILTER_VALIDATE_EMAIL)){
        echo "<div>Your email address is not valid.</div>";
    }
 
    else{
 
 
        
        $query = "SELECT id FROM users WHERE email = ? and verified = '1'";
        $stmt = $con->prepare( $query );
        $stmt->bindParam(1, $Email_Id);
        $stmt->execute();
        $num = $stmt->rowCount();
 
        if($num>0){
            echo "<div>Your email is already activated.</div>";
        }
 
        else{
 
            $query = "SELECT id FROM users WHERE email = ? and verified = '0'";
            $stmt = $con->prepare( $query );
            $stmt->bindParam(1, $Email_Id);
            $stmt->execute();
			$num = $stmt->rowCount();
 
            if($num>0){
 
                echo "<div>Your email is already in the system but not yet verified.</div>";
            }
 
            else{
 
               
                $verificationCode = md5($Email_Id.$Mobile_Number.time());

                $verificationLink = "http://localhost:8012/pimcore/Assignment%201/activate.php" . $verificationCode;
 
                $htmlStr = "";
                $htmlStr .= "Hi " . $Email_Id . ",<br /><br />";
 
                $htmlStr .= "Please click the button below to verify your Details.<br /><br /><br />";
                $htmlStr .= "<a href='{$verificationLink}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY EMAIL</a><br /><br /><br />";
 
                $htmlStr .= "Kind regards,<br />";
 
 
                $name = "Kushagra Agrawal";
                $email_sender = "kushagra369@gmail.com";
                $subject = "Verification Link";
                $recipient_email = $Email_Id;
 
                $headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                $headers .= "From: {$name} <{$email_sender}> \n";
 
                $body = $htmlStr;
 
               $headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);
 
$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'kushagra369@gmail',
        'password' => 'tupperware2'
    ));
 
$mail = $smtp->send($to, $headers, $body);


                if($mail = $smtp->send($to, $headers, $body)){			
			
                    echo "<div id='successMessage'>A verification email were sent to <b>" . $email . "</b>, please open your email inbox and click the given link so you can login.</div>";
 
 
                    
                    $created = date('Y-m-d H:i:s');
 
                   
                    $query = "INSERT INTO
                                users
                            SET
                                email = ?,
                                verification_code = ?,
                                created = ?,
                                verified = '0'";
 
                    $stmt = $con->prepare($query);
 
                    $stmt->bindParam(1, $email);
                    $stmt->bindParam(2, $verificationCode);
                    $stmt->bindParam(3, $created);
 
                    if($stmt->execute()){

                    }else{
                        echo "<div>Unable to save your email to the database.";
                     
                    }
 
                }else{
                    die("Sending failed.");
                }
            }
 
 
        }
 
    }
 
}

?>







