 <?php
$servername = "localhost";
$username = "root";
$password = "foo.bar143";
$dbname = "baskogsportsweear";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		

?>

<html>

	<head>
		<link rel="stylesheet" href="mystyle.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>Baskog Sportswear</title>
		<nav>
			<ul>
			  <li><a  href="#home"><i class="glyphicon glyphicon-home"></i>&nbsp;Home</a></li>
			  <li><a class="active" href="#register" href=><i class="glyphicon glyphicon-user"></i>&nbsp;Customer</a></li>
			  <li><a href="#jobOrder" href=><i class="glyphicon glyphicon-envelope"></i>&nbsp;Job Order</a></li>
			  <li><a href="#Inventory" href=><i class="glyphicon glyphicon-cloud"></i>&nbsp;Inventory</a></li>
			</ul>	
		</nav>
	</head>
	<body>
	
	<?php
		
		$sql = "SELECT CustID, CustName, CustAdd FROM Customer where CustID = '".$_POST['id']."'";
			$result = mysqli_query($conn,$sql);
		if ($result->num_rows > 0) 
			
	
				
    
				while($row = $result->fetch_assoc()) : // Places values here after search
					
				
			?>
			
		<div id="RegTab" style="height: 470;">
                <center>
					

                    <form action="updatecheck.php" method="Post">
                    <h1>Update Customer</h1>
					<br>
					ID: <?php echo $_POST['id'];?><br>
					Name: <?php echo $row['CustName'];?><br>
					Address: <?php echo $row['CustAdd']?><br>
					<br>

                    First Name:<br> <input type=text name="fname"><br><br>
                    Last Name:<br><input type=text name="lname"><br><br>
					Address: <br><input type=text name="address"><br><br>
					<input type ="hidden" value = "<?php echo $row['CustID']?>" name ="NewID">
                         <a href="delete_methode_link" onclick="return confirm('Are you sure you want to Update?');" style="color: black;
    text-decoration: none;">
                    <input type=submit value=Update class="btnlogin" style="font-family:'Impact';">
                    </a>
                    </form>
                    
					<br><br>
					<form action="http://localhost/baskogsportswear/customer.php" method="Post">
					<input type=submit value=Cancel ><br>
					  </form>
                </center>
            </div>
			<?php endwhile;?>
	</body>
</html>