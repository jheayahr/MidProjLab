<?php session_start();

$servername = "localhost";
$username = "root";
$password = "foo.bar143";
$dbname = "baskogsportsweear";
$ID = $_POST['newID'];
$Measure=$_POST['measurements'];
$Date = $_POST['date'];
$Deadline=$_POST['deadline'];
$Item = $_POST['item'];
$material = $_POST['materialNo'];



$conn = new mysqli($servername, $username, $password, $dbname);

if($Item == "Jersey"){
    $length = 2;
    $threads= 5;
}
else{
    $length = 1;
    $threads = 5;
}

$get = "SELECT * from stocks where MaterialDetailNo like '%".$material."%'";
$result = mysqli_query($conn,$get);

				while($row3 = $result->fetch_assoc()) : // Places values here after search
                $Stock = $row3['StockNo'];

endwhile;


$query = "INSERT INTO materials (StockNo, NoOfThreads, Length)
VALUES ('".$Stock."', '".$threads."' , '".$length."')";
mysqli_query($conn,$query);
$mtrlID = $conn->insert_id;

$update = "UPDATE stocks SET CurrentStockInfo = CurrentStockInfo - ".$length;
mysqli_query($conn,$update);

$SvcFee = 500.00;
$query2 = "INSERT INTO orderdetail (TailorID, SvcFee)
VALUES ('".$tailorID."', '".$SvcFee."')";

mysqli_query ($conn,$query2);



$query3 = "INSERT INTO joborder (ORDtlNum, CustID, MtrlID,Measurements,ORDate,ORDeadline,Item)
VALUES ('".$conn->insert_id."', '".$ID."', '".$mtrlID."', '".$Measure."', '".$Date."', '".$Deadline."', '".$Item."')";
mysqli_query ($conn,$query3);

header("location: http://localhost/baskogsportswear/joborder.php");
?>
