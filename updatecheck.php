<?php
$servername = "localhost";
$username = "root";
$password = "foo.bar143";
$dbname = "baskogsportsweear";
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$id = $_POST['id'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE customer SET CustName='".$fname." ".$lname."', CustAdd='".$address."' WHERE CustID='".$id."'";

if ($conn->query($sql) === TRUE) {
   header("location: http://localhost/baskogsportswear/customer.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>