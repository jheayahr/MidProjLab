<hmtl>
    <head>
        <link rel="stylesheet" href="mystyle.css">
        <title>Baskog Sportswear</title>
        <link rel="icon" type="image/ico" href="http://localhost/baskogsportswear/sports.png">
    </head>
    <body>
        <div id="mainframe">
            <center>
                <img src="http://localhost/BaskogSportswear/baskog.png" class="baskogpic">
            </center>
            <div id="loginframe">
                <center>
                    <form action="http://localhost/baskogsportswear/logincheck.php" method="Post">
                    <h1>Welcome!</h1>
                    Username:&nbsp; <input type=text name="user"><br><br>
                    Password:&nbsp; <input type=password name="password"><br><br>
                    Login as:<br> 
                      <input type="radio" name="loggedin" value="Admin">Admin&nbsp;
                      <input type="radio" name="loggedin" value="User" checked="checked">User<br><br>
                    <input type=submit value=Login class="btnlogin" style="font-family:'Impact';"><br>
                    <p>Don't have an account yet? <strong><a href="http://localhost/baskogsportswear/register.php" style="text-decoration:none">CREATE HERE.</strong></p>
                    </form>
                </center>
            </div>
        </div>
    </body>
</hmtl>