
<?php session_start();
$servername = "localhost";
$username = "root";
$password = "foo.bar143";
$dbname = "baskogsportsweear";
$name ="";
$ID="";

$admin = $_SESSION['admin'];

if(isset($_SESSION['lulz'])){
   $tailorID = $_SESSION['lulz'];
}
else{
   $tailorID = "";
}

$sql = "SELECT * FROM Customer where TailorID like '%".$tailorID."%' AND CustName like '%".$name."%' order by CustID asc";


if ($admin =="Admin"){
    $sql = "SELECT * FROM Customer where CustName like '%".$name."%' order by CustID asc";
}

$conn = new mysqli($servername, $username, $password, $dbname);


if(isset($_POST['user']) &&  $admin =="User"){    //Searching Purposes
	$name = $_POST['user'];
    
     $sql = "SELECT * FROM Customer where TailorID like '%".$tailorID."%' AND CustName like '%".$name."%' order by CustID asc";

}
else if (isset($_POST['user']) && $admin =="Admin"){
     $name = $_POST['user'];
     $sql = "SELECT * FROM Customer where CustName like '%".$name."%' order by CustID asc";
}




?>

<html>
	<head>
		<link rel="stylesheet" href="mystyle.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="myscript.js" type="text/javascript"></script>

    <title>Baskog Sportswear</title>
    <link rel="icon" type="image/ico" href="http://localhost/baskogsportswear/sports.png">
		<nav>
			<ul>
            <center>
            <li >            
                <div id="homenavbar" >
                    <div class="profpic"style="background-image:url(http://localhost/baskogsportswear/showimage.php)">
                        <div class="profname">
                            <p style="font-size:60%;height:auto;"><i class="glyphicon glyphicon-log-in" style="font-size:100%;color:white;padding:6px;"></i>Logged in as:</p>
                            <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname'];?>
                        </div>
                    </div>
                </div> 
            </li>
			  <li><a  href="http://localhost/baskogsportswear/home.php"><i class="glyphicon glyphicon-home" style="font-size:30px;color:darkgray;padding:6px;"></i><br>Home</a></li>
			  <li><a class="active" href="http://localhost/baskogsportswear/customer.php"><i class="glyphicon glyphicon-user" style="font-size:30px;color:white;padding:6px;"></i><br>Customer</a></li>
			 <li><a href="http://localhost/baskogsportswear/joborder.php"><i class="glyphicon glyphicon-envelope" style="font-size:30px;color:darkgray;padding:6px;"></i><br>Job Order</a></li>
			  <li><a href="http://localhost/baskogsportswear/inventory.php"><i class="glyphicon glyphicon-cloud" style="font-size:30px;color:darkgray;padding:6px;"></i><br>Inventory</a></li>
            </center>
			</ul>
		</nav>
	</head>
	<body>
        <div id="homepage" style="margin-left:10%;margin-left:10%;padding:1px 16px;font-family: Century Gothic; font-size:20px;">  
            <div style="width:102.2%;height:15px;background:#12471C;margin-left:-16.2px;"></div>
            <div  style="width:102.2%;height:25px;background:#1C762D;margin-left:-16.2px;"></div>
            <div class="bubble"> 
                <div style="position:absolute;top:-4;left:25;font-size:200%;font-family:Century Gothic;font-weight:bold;color:white;">
                    CUSTOMER
                </div>    
                <div class="dropdown" style="position:absolute;right:2%;">
                   <button onclick="myFunction()" class="dropbtn"><i class="glyphicon glyphicon-cog" style="font-size:145%;color:white;padding: 5px;"></i></button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="http://localhost/baskogsportswear/logout.php"><i class="glyphicon glyphicon-off" style="font-size:20;color:#3F3D3D;padding-right:7px;"></i>LOGOUT</a>
                    </div>
                </div>
            </div>  
        </div>
<div style="margin-left:10%;margin-top:50px;padding:1px 16px;">
            <form action="customer.php" method="POST">
			<input type="text" name="user" placeholder="Search by Name"> &nbsp; 
            <button type="submit" style = "padding-bottom: 6px;">
                <i class="glyphicon glyphicon-search"></i>
            </button><br><br>
             <!search form>
		 </form>
<div style="margin-bottom:-30px; margin-top:30px;">
		
    </div>
		 <div class="wew">
		 <table>
			<tr >
				<th style="text-align: center;">Customer I.D</th>
				<th style="text-align: center;">Customer Name</th> 
				<th style="text-align: center;">Customer Address</th>
				<th style="text-align:center">Action</th>
			</tr>
			
		<?php
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		   
             
         $result = mysqli_query($conn,$sql);
			
		if ($result->num_rows > 0) 
			
	
				
    
				while($row = $result->fetch_assoc()) : // Places values here after search
					
				
			?>
			<tr >
                
				<td><?php echo $row["CustID"]; ?> </td>
				<td><?php echo $row["CustName"]; ?> </td>
				<td><?php echo $row["CustAdd"]; ?> </td>
				<td style="text-align:center">
                    
                   <a href="delete_methode_link" onclick="return confirm('Are you sure you want to Remove?');" style="color: black;
    text-decoration: none;">

					<form action="deletecheck.php" method="POST">
						<input type="hidden" name="deleteID" value="<?php echo $row["CustID"];?>">
                        <button type="submit" style = "height: 25px;">
                            <i class="glyphicon glyphicon-trash"></i>
                        </button>
                        <! Delete Form>
					</form>
                        
                    </a>    
					<form action="updateCustomer.php" method="POST">                                                       
                        
                        <button id="btn" type="submit" data-toggle="modal" data-target="#updateModal" style = "height: 25px;  margin-top: 5px; margin-bottom: 5px;">
                    
                         <input type="hidden" name="id" value="<?php echo $row["CustID"];?>"> 
                        
                             
               
                        
                        
                        
                            <i class="glyphicon glyphicon-refresh"></i>
                           
                        </button>
                    </form>

				
				</td>
                
			</tr>
			
			<?php endwhile;?>
    	
		
		</table>
		
		 </div>
	
		 <div class="container" style="text-align: right; margin-right:25px; margin-top: 10px; ">
 

  <button type="button" class="buttoon" data-toggle="modal" data-target="#registerModal">Add Customer</button>

  <div class="modal fade" id="registerModal" role="dialog">
      
    <div class="modal-dialog"> <!---- // Places values here after search (add modal-lg or sm ---->
    
   
      <div class="modal-content">
        <div class="modal-header" style="background-color: #4CAF50;">
          <button type="button" class="close" data-dismiss="modal"></button>
          <h3 class="modal-title" style="text-align:center; color:white;"><b>Register Customer</b></h3>
        </div>
        <div class="modal-body">
           <center>
				
                    <form action="http://localhost/baskogsportswear/addcheck.php" method="Post"> <! Customer Form>
                   					
					I.D.<br> <input type=text name="ID"  style="width: 40%; text-align:center;"><br><br>
                    First Name:<br> <input type=text name="fname"  style="width: 40%; text-align:center;"><br><br>
                    Last Name:<br><input type=text name="lname"  style="width: 40%; text-align:center;"><br><br>
					Address: <br><input type=text name="address"  style="width: 40%; text-align:center;"><br><br>
                        
                    <hr>
                        
                                 

                    Item:<br> <input type="radio" name="item" value="Jersey"> Jersey Set &nbsp;
                              <input type="radio" name="item" value="Custom"> Custom Print

<br><br>
                        <?php
        $sql0 = "SELECT * FROM materialdetail where TypeofMtrl like '%%' ";
         $result = mysqli_query($conn,$sql0);
			  echo  " I.D.<br><select name ='materialNo' style='width: 40%; '>";
		if ($result->num_rows  > 0) 

				while($row3 = $result->fetch_assoc()) : // Places values here after search
					
				
	
                      
                        
					       
                            echo "<option value='".$row3['MaterialDetailNo']."'>".$row3['TypeofMtrl']."</option>";
                          
                        
                        
                        
                        
                        
                        
              endwhile;
                         echo "</select> "; 
                       
                        ?><br><br>
                    Measurements (cm):<br><input type=text name="measurements" style="width: 40%; text-align:center;"><br><br>
                    Date:<br><input type=text name="date" id ="date" style="width: 40%; text-align:center;"><br><br>
                        
                    <script>

                        var d = new Date();
                        var m = new Date();
                        var y = new Date();

                        m = m.getMonth()+1;
                        d = d.getDate();
                        y = y.getFullYear();

                        document.getElementById("date").value = y+"-"+m+"-"+d;
                    </script>
                        
                    Deadline:<br><input type=text name="deadline" style="width: 40%; text-align:center;"><br><br><br>
			
                    <input type=submit value=Register class="btnlogin" style="font-family:'Impact'; background-color:#4CAF50;">
                    </form>
                    
					<br><br>
			
                </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

</div>
		</div>
	</body>
    <br>
    <br>
    <br>
    <br>
    <div class="footer" style="margin-top:60px;margin-left:30px;width:98%;">
                <center>
                    <p style="font-size: 100%;">Terms and Conditions Apply.<br>
                        Copyright © 2018 Baskog Sportswear.</p>
                </center>
    </div>
</html>

   