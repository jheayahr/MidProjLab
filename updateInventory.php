<?php
$servername = "localhost";
$username = "root";
$password = "foo.bar143";
$dbname = "baskogsportsweear";
$add = $_POST['addInv'];
$StockNo = $_POST['StockNo'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$update = "UPDATE stocks SET CurrentStockInfo = CurrentStockInfo + ".$add.", StockAdded = '".$add."' where StockNo ='".$StockNo."'";


if ($conn->query($update) === TRUE) {
   header("location: http://localhost/baskogsportswear/Inventory.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>