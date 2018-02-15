<?php session_start();
$servername = "localhost";
$username = "root";
$password = "foo.bar143";
$dbname = "baskogsportsweear";
$buttonStat ="";
$ID="";


$admin = $_SESSION['admin'];


$sql = "SELECT * FROM stocks order by StockNo asc";




$conn = new mysqli($servername, $username, $password, $dbname);


if($admin =="User"){    //Searching Purposes
	
   $buttonStat ="disabled";

}
else if ($admin =="Admin"){
     
    $buttonStat ="";
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
			 <li><a href="http://localhost/baskogsportswear/joborder.php"><i class="glyphicon glyphicon-envelope" style="font-size:30px;color:darkgray;padding:6px;"></i><br>Job Order</a></li>
			  <li><a class="active" href="http://localhost/baskogsportswear/inventory.php"><i class="glyphicon glyphicon-cloud" style="font-size:30px;color:white;padding:6px;"></i><br>Inventory</a></li>
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
                    INVENTORY
                </div>    
                <div class="dropdown" style="position:absolute;right:2%;">
                   <button onclick="myFunction()" class="dropbtn"><i class="glyphicon glyphicon-cog" style="font-size:145%;color:white;padding: 5px;"></i></button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="http://localhost/baskogsportswear/logout.php"><i class="glyphicon glyphicon-off" style="font-size:20;color:#3F3D3D;padding-right:7px;"></i>LOGOUT</a>
                    </div>
                </div>
            </div>  
        </div>  
        
<div style="margin-left:10%;padding:1px 16px; margin-top:50px;">        
<div style="margin-bottom:-30px; margin-top:30px;">
		
    </div>
		 <div class="wew">


		 <table>
			<tr >
				<th>Stock Number</th>
                 <th>Material Detail No.</th> 
				<th>Stock Recently Added</th>
				<th>Date Stock Added</th>
                <th>Current Stock Info</th>
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
                
				<td><?php echo $row["StockNo"]; ?> </td>
                <td><?php echo $row["MaterialDetailNo"]; ?> </td>
				<td><?php echo $row["StockAdded"]; ?> </td>
				<td><?php echo $row["DateAdded"]; ?> </td>
                <td><?php echo $row["CurrentStockInfo"]; ?> </td>
				<td style="text-align:center">
                    
                   

					<form action="updateInventory.php" method="POST">
						<input type="hidden" name="StockNo" value="<?php echo $row["StockNo"];?>">
                        <input type="text" name="addInv">
                        <a href="delete_methode_link" onclick="return confirm('Are you sure you want to add?');" style="color: black;
    text-decoration: none;">
                        <button type="submit" style = "height: 25px;  margin-top: 5px; margin-bottom: 5px;"<?php echo $buttonStat?> >
                            <i class="glyphicon glyphicon-plus"></i>
                        </button>
                        </a> 
					</form>
         

				
				</td>
                
			</tr>
			
			<?php endwhile;?>
    	
		
		</table>
		
		 </div>
	
		 <div class="container" style="text-align: right; margin-right:25px; margin-top: 10px; ">
 

  <button type="button" class="buttoon" data-toggle="modal" data-target="#inventoryModal" <?php echo $buttonStat ?>>Add Inventory</button>

  <div class="modal fade" id="inventoryModal" role="dialog">
      
    <div class="modal-dialog"> <!---- // Places values here after search (add modal-lg or sm ---->
    
   
      <div class="modal-content">
        <div class="modal-header" style="background-color: #4CAF50;">
          <button type="button" class="close" data-dismiss="modal"></button>
          <h3 class="modal-title" style="text-align:center; color:white;"><b>Add New Stock</b></h3>
        </div>
        <div class="modal-body">
           <center>
				
                    <form action="http://localhost/baskogsportswear/addInventory.php" method="Post"> <! Customer Form>
                   					
                    Type Of Material:<br> <input type=text name="type"  style="width: 40%; text-align:center;"><br><br>
                    Material Color:<br><input type=text name="color"  style="width: 40%; text-align:center;"><br><br>
					Quantity: <br><input type=text name="qnty"  style="width: 40%; text-align:center;"><br><br>
                    <br><input type=hidden name="date" id ="date" style="width: 40%; text-align:center;">   
                  
                        
                    <script>

                        var d = new Date();
                        var m = new Date();
                        var y = new Date();

                        m = m.getMonth()+1;
                        d = d.getDate();
                        y = y.getFullYear();

                        document.getElementById("date").value = y+"-"+m+"-"+d;
                    </script>
                        
            
			
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
    <br>
    <br>
        <div class="footer" style="margin-left:30px;width:98%;">
                <center>
                  <p style="font-size: 100%;">Terms and Conditions Apply.<br>
                    Copyright © 2018 Baskog Sportswear.</p>
                </center>
    </div>
</html>

   