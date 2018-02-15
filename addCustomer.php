<html>
	<head>
		<link rel="stylesheet" href="mystyle.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>Baskog Sportswear</title>
		<nav>
			<ul>
			  <li><a href="http://localhost/baskogsportswear/home.php"><i class="glyphicon glyphicon-home"></i>&nbsp;Home</a></li>
			  <li><a class="active" href="http://localhost/baskogsportswear/customer.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Customer</a></li>
			  <li><a href="#jobOrder" href=><i class="glyphicon glyphicon-envelope"></i>&nbsp;Job Order</a></li>
			  <li><a href="#Inventory" href=><i class="glyphicon glyphicon-cloud"></i>&nbsp;Inventory</a></li>
			</ul>	
		</nav>
	</head>
	<body>
		<div id="RegTab">
                <center>
				
                    <form action="http://localhost/baskogsportswear/addcheck.php" method="Post"> <! Customer Form>
                    <h1>Register Customer</h1>
					<br>
					I.D.<br> <input type=text name="ID"><br><br>
                    First Name:<br> <input type=text name="fname"><br><br>
                    Last Name:<br><input type=text name="lname"><br><br>
					Address: <br><input type=text name="address"><br><br>
                    <input type=submit value=Register class="btnlogin" style="font-family:'Impact';">
                    </form>
                    
					<br><br>
					<form action="http://localhost/baskogsportswear/customer.php" method="Post">
					<input type=submit value=Cancel ><br>
				    </form>
                </center>
            </div>
			
	</body>
</html>