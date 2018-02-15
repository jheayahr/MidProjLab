<?php session_start();?>
<html>
	<head>
        <style>
            /* Center the loader */
            #loader {
              position: absolute;
              left: 50%;
              top: 50%;
              z-index: 1;
              width: 150px;
              height: 150px;
              margin: -75px 0 0 -75px;
              border: 16px solid #f3f3f3;
              border-radius: 50%;
              border-top: 16px solid #289E3F;
              width: 120px;
              height: 120px;
              -webkit-animation: spin 2s linear infinite;
              animation: spin 2s linear infinite;
            }

            @-webkit-keyframes spin {
              0% { -webkit-transform: rotate(0deg); }
              100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
            }

            /* Add animation to "page content" */
            .animate-bottom {
              position: relative;
              -webkit-animation-name: animatebottom;
              -webkit-animation-duration: 1s;
              animation-name: animatebottom;
              animation-duration: 1s
            }

            @-webkit-keyframes animatebottom {
              from { bottom:-100px; opacity:0 } 
              to { bottom:0px; opacity:1 }
            }

            @keyframes animatebottom { 
              from{ bottom:-100px; opacity:0 } 
              to{ bottom:0; opacity:1 }
            }

            #homepage {
              display: none;
              text-align: center;
            }
        </style>
		<link rel="stylesheet" href="mystyle.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="myscript.js"></script>
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
			  <li><a class="active" href="http://localhost/baskogsportswear/home.php"><i class="glyphicon glyphicon-home" style="font-size:30px;color:white;padding:6px;"></i><br>Home</a></li>
			  <li><a href="http://localhost/baskogsportswear/customer.php"><i class="glyphicon glyphicon-user" style="font-size:30px;color:darkgray;padding:6px;"></i><br>Customer</a></li>
			 <li><a href="http://localhost/baskogsportswear/joborder.php"><i class="glyphicon glyphicon-envelope" style="font-size:30px;color:darkgray;padding:6px;"></i><br>Job Order</a></li>
			  <li><a href="http://localhost/baskogsportswear/inventory.php"><i class="glyphicon glyphicon-cloud" style="font-size:30px;color:darkgray;padding:6px;"></i><br>Inventory</a></li>
            </center>
			</ul>
		</nav>
	</head>
	<body class="homepage" onload="loaderFunc()">
        <div id="loader"></div>
        <div id="homepage" class="animate-bottom" style="margin-left:10%;padding:1px 16px;height:1000px;font-family: Century Gothic; font-size:20px;display:none;">  
            <div style="width:102.2%;height:15px;background:#12471C;margin-left:-16.2px;"></div>
            <div  style="width:102.2%;height:25px;background:#1C762D;margin-left:-16.2px;"></div>
            <div class="bubble"> 
                <div style="position:absolute;top:-4;left:25;font-size:200%;font-family:Century Gothic;font-weight:bold;color:white;">
                    HOME
                </div>    
                <div class="dropdown" style="position:absolute;right:2%;">
                   <button onclick="myFunction()" class="dropbtn"><i class="glyphicon glyphicon-cog" style="font-size:145%;color:white;padding: 5px;"></i></button>
                    <div id="myDropdown" class="dropdown-content">
                    <a href="http://localhost/baskogsportswear/logout.php"><i class="glyphicon glyphicon-off" style="font-size:20;color:#3F3D3D;padding-right:7px;"></i>LOGOUT</a>
                </div>
                </div>
            </div>
            <p style="margin-top:50px;margin-left:30px;">
                 With over a thousand apparels sold, Baskog Sportswear is a direct to consumer provider of print-on-demand, customizable apparel serving consumers, media properties, and school and collegiate athletic departments in Bacolod.
            </p>
            <table class="table" style="margin-top:50px;margin-left:30px;width:98%;">
              <tr>
                <td class="missionvisiontable" style="background:#9BC609;color:white;"><br><i class="glyphicon glyphicon-search" style="font-size:1000%;color:white"></i><br><br><br>We search for the ones you need the most.</td>
                <td class="missionvisiontable" style="background:#0CC0C7;color:white;"><br><i class="glyphicon glyphicon-calendar" style="font-size:1000%;color:white"></i><br><br><br>We accomplish on time, every time.</td>
                <td class="missionvisiontable" style="background:#950DA5;color:white"><br><i class="glyphicon glyphicon-heart" style="font-size:1000%;color:white"></i><br><br><br>Every finished product is made and handled with care.</td>
              </tr>
            </table>
            <div class="missionvisionHeader" style="margin-top:50px;margin-left:30px;width:98%;">
                Mission Statement:
            </div>    
            <div class="missionvisionContent" style=";margin-left:30px;width:98%;">
                <p style="margin-left:40px;margin-top:10px;">At baskog sportswear we pride ourselves with the quality service and products from our trusted suppliers. As the name implies "baskog" our materials are extra durable because we believe in a balance of durability and comfort for customers.</p>
            </div>
            <div class="missionvisionHeader" style="margin-top:20px;margin-left:30px;width:98%;">
                Vision Statement:
            </div>    
            <div class="missionvisionContent" style=";margin-left:30px;width:98%;">
                <p style="margin-left:40px;margin-top:10px;">Our vision is to provide our customers with high quality materials for their daily use. We envision a world where our customers are satisfied and happy with our products</p>
            </div>
            <br>
            <br>
            <br>
            <div class="footer" style="margin-top:60px;margin-left:30px;width:98%;">
                <center>
                    <img src="baskog.png" style="width:12%">&nbsp;<img src="unorlogo.png" style="width: 7%">&nbsp;<img src="it.png" style="width: 7%"><br><br>
                    <p style="font-size: 80%;">Terms and Conditions Apply.<br>
                        Copyright © 2018 Baskog Sportswear.</p>
                </center>
            </div>
        </div>
         <script>
            var myVar;

            function loaderFunc(){
                myVar = setTimeout(showPage, 3000);
            }

            function showPage() {
              document.getElementById("loader").style.display = "none";
              document.getElementById("homepage").style.display = "block";
            }
        </script>       
	</body>
</html>