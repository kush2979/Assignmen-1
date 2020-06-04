<?php

 

$query = "SELECT id FROM users WHERE verification_code = ? and verified = '0'";
$stmt = $con->prepare( $query );
$stmt->bindParam(1, $_GET['code']);
$stmt->execute();
$num = $stmt->rowCount();
 
if($num>0){

    $query = "UPDATE users
                set verified = '1'
                where verification_code = :verification_code";
 
    $stmt = $con->prepare($query);
    $stmt->bindParam(':verification_code', $_GET['code']);
 
    if($stmt->execute()){
    
        echo "<div>Your email is valid, thanks!. You may now login.</div>";
    }else{
        echo "<div>Unable to update verification code.</div>";
     
    }
 
}else{
  
    echo "<div>We can't find your verification code.</div>";
}
?>