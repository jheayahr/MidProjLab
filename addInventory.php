<?php session_start();

$servername = "localhost";
$username = "root";
$password = "foo.bar143";
$dbname = "baskogsportsweear";
$color=$_POST['color'] ;
$type= $_POST['type'] ;
$quantity=$_POST['qnty'] ;
$date = $_POST['date'] ;

$conn = new mysqli($servername, $username, $password, $dbname);

$query = "INSERT INTO materialdetail(MtrlColor, TypeofMtrl)
VALUES ('".$color."', '".$type."')";

mysqli_query ($conn,$query);

$query2 = "INSERT INTO stocks (MaterialDetailNo,StockAdded,DateAdded, CurrentStockInfo)
VALUES ('".$conn->insert_id."','".$quantity."', '".$date."', '".$quantity."')";


mysqli_query ($conn,$query2);



header("location: http://localhost/baskogsportswear/inventory.php");


?>
