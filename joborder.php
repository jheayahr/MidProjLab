<?php session_start();
$servername = "localhost";
$username = "root";
$password = "foo.bar143";
$dbname = "baskogsportsweear";
$name ="";
$ID="";
$jo = "";

$admin = $_SESSION['admin'];

if(isset($_SESSION['lulz'])){
   $tailorID = $_SESSION['lulz'];
}
else{
   $tailorID = "";
}

$sql = "SELECT * FROM Customer where TailorID like '%".$tailorID."%' AND CustName like '%%'";


if ($admin =="Admin"){
    
    $sql = "SELECT * FROM Customer where CustName like '%%'";
}

$conn = new mysqli($servername, $username, $password, $dbname);


if(isset($_POST['user']) &&  $admin =="User"){    //Searching Purposes
	$name = $_POST['user'];
    $jo = $_POST['user'];
     $sql = "SELECT * FROM Customer where TailorID like '%".$tailorID."%' AND CustName like '%%'";

}
else if (isset($_POST['user']) && $admin =="Admin"){
     $name = $_POST['user'];
    $jo = $_POST['user'];
     $sql = "SELECT * FROM Customer where CustName like '%%'";
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
        <script type="text/javascript"></script>
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
			  <li><a href="http://localhost/baskogsportswear/customer.php"><i class="glyphicon glyphicon-user" style="font-size:30px;color:darkgray;padding:6px;"></i><br>Customer</a></li>
			 <li><a class="active" href="http://localhost/baskogsportswear/joborder.php"><i class="glyphicon glyphicon-envelope" style="font-size:30px;color:white;padding:6px;"></i><br>Job Order</a></li>
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
                    JOB ORDER
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
            <form action="joborder.php" method="POST">
			<input type="text" name="user" placeholder="Search by Customer ID"> &nbsp; 
            <button type="submit" style = "padding-bottom: 6px;">
                <i class="glyphicon glyphicon-search"></i>
            </button><br><br>
             <!search form>
		 </form>
<div style="margin-bottom:-30px; margin-top:30px;">
    </div>
		 <div class="wew" id="wew">


		 <table>
			<tr >
                <th style="text-align: center;">Customer I.D</th>
				<th style="text-align: center;">Order Number</th>
				<th style="text-align: center;">Order Detail Number</th> 
                <th style="text-align: center;">Material I.D</th>
                <th style="text-align: center;">Item</th>
                <th style="text-align: center;">Measurements</th>
                <th style="text-align: center;">Date Ordered</th>
                <th style="text-align: center;">Date Due</th>
				<th style="text-align:center">Action</th>
			</tr>
			
		<?php
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		   
             
         $result = mysqli_query($conn,$sql);
			
		if ($result->num_rows > 0) 
			
	
				
    
				while($row = $result->fetch_assoc()) : // Places values here after search
					
				$sql2 = "SELECT * FROM joborder where CustID = '".$row["CustID"]."' AND CustID like '%".$jo."%'";
                $result2 = mysqli_query($conn,$sql2);
                    if ($result2->num_rows > 0) 
                        while($row2 = $result2->fetch_assoc()) :
			?>
			<tr >
                <td><?php echo $row2["CustID"]; ?></td>
				<td><?php echo $row2["ORNum"]; ?> </td>
				<td><?php echo $row2["ORDtlNum"]; ?></td>
                <td><?php echo $row2["MtrlID"]; ?></td>
                <td><?php echo $row2["Item"]; ?></td>
                <td><?php echo $row2["Measurements"]; ?></td>
                <td><?php echo $row2["ORDate"]; ?> </td>
                <td><?php echo $row2["ORDeadline"]; ?></td>
				<td style="text-align:center">
                    
                   <a href="delete_methode_link" onclick="return confirm('This means that the order is done, are you sure?');" style="color: black;
    text-decoration: none;">

					<form action="joborderdelete.php" method="POST">
                        <input type="hidden" name="deleteORD" value="<?php echo $row2["ORDtlNum"];?>">
						<input type="hidden" name="deleteID" value="<?php echo $row2["CustID"];?>">
                        <button type="submit" style = "height: 25px;  margin-top: 5px; margin-bottom: 5px;">
                            <i class="glyphicon glyphicon-ok"></i>
                        </button>
                        <! Delete Form>
					</form>
                        
                    </a>    
					

				
				</td>
                
			</tr>
			
		<?php endwhile; endwhile;?>
    	
		
		</table>
		
		 </div>
            		 <div class="container" style="text-align: right; margin-right:25px; margin-top: 10px; ">

	 <button type="button" class = "buttoon" data-toggle="modal" data-target="#joborderModal" style="text-align: right;">Add Order</button>
                         
    <div class="modal fade" id="joborderModal" role="dialog">
      
    <div class="modal-dialog"> <!---- // Places values here after search (add modal-lg or sm ---->
    
   
      <div class="modal-content">
        <div class="modal-header" style="background-color: #4CAF50;">
          <button type="button" class="close" data-dismiss="modal"></button>
          <h3 class="modal-title" style="text-align:center; color:white;"><b>New Job Order</b></h3>
        </div>
        <div class="modal-body">
           <center>
				
                    <form action="http://localhost/baskogsportswear/newOrder.php" method="Post"> <! Customer Form>
                       
                   					
                        
                        <?php
     
         $result = mysqli_query($conn,$sql);
			  echo  " I.D.<br><select name ='newID' style='width: 40%; '>";
		if ($result->num_rows  > 0) 

				while($row2 = $result->fetch_assoc()) : // Places values here after search
					
				
	
                      
                        
					       
                            echo "<option value='".$row2['CustID']."'>".$row2['CustName']."</option>";
                          
                        
                        
                        
                        
                        
                        
              endwhile;
                         echo "</select> "; 
                       
                        ?>
                        <br><br>
                                 

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
                       
                        ?>
                        <br><br>
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
                        
                    Deadline:<br><input type=text name="deadline" style="width: 40%; text-align:center;">
                        
           
               <br><br><br>
			
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
    <br>
    <br>
    <br>
    
    <div class="footer" style="margin-left:30px;width:98%;">
                <center>
                  <p style="font-size: 100%;">Terms and Conditions Apply.<br>
                    Copyright © 2018 Baskog Sportswear.</p>
                </center>
    </div>
</html>

   