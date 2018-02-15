<?php
$servername = "localhost";
$username = "root";
$password = "foo.bar143";
$dbname = "baskogsportsweear";


$conn = new mysqli($servername, $username, $password, $dbname);

$sql2 = "DELETE FROM joborder WHERE CustID= '".$_POST['deleteID']."'LIMIT 1";
mysqli_query ($conn,$sql2);

$sql3 = "DELETE FROM orderdetail WHERE ORDtlNum = '".$_POST['deleteORD']."'LIMIT 1";
mysqli_query ($conn,$sql3);


header("location: http://localhost/baskogsportswear/joborder.php");


?>

