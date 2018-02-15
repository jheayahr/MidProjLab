<html>
<head>
    <title>Baskog Sportswear-Register</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
    <body>
        <div id="RegTab" style="height:740px">
            
          <script type="text/javascript">

                  function checkPassword(str)
                  {
                    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
                    return re.test(str);
                  }

                  function checkForm(form)
                  {
                    if(form.reguser.value == "") {
                      alert("Error: Username cannot be blank!");
                      form.reguser.focus();
                      return false;
                    header("location: http://localhost/baskogsportswear/register.php");
                    }
                    re = /^\w+$/;
                    if(!re.test(form.reguser.value)) {
                      alert("Error: Username must contain only letters, numbers and underscores!");
                      form.reguser.focus();
                      return false;
                     header("location: http://localhost/baskogsportswear/register.php");
                    }
                    if(form.regpass.value != "" && form.regpass.value == form.regpassconfirm.value) {
                      if(!checkPassword(form.regpass.value)) {
                        alert("The password you have entered is not valid!");
                        form.regpass.focus();
                        return false;
                         header("location: http://localhost/baskogsportswear/register.php");
                      }
                    } else {
                      alert("Error: Please check that you've entered and confirmed your password!");
                      form.regpass.focus();
                      return false;
                    header("location: http://localhost/baskogsportswear/register.php");
                    }
                    return true;
                  }

            </script>           
            <form method="Post" onsubmit="return checkForm(this);" action="http://localhost/baskogsportswear/newuser.php" enctype="multipart/form-data">
                <div id="register" >
                    <center>
                    <h1>Create an Account</h1>
                    Set Username:<br><input type=text name="reguser"><br>
                    Set Password:   (Must contain one capital letter, numbers or underscores)<br><input type=password name="regpass"><br>
                    Confirm Password:<br><input type=password name="regpassconfirm"><br>
                    Name:<br>
                    First<br><input type=text name="regfname"><br>
                    Middle<br><input type=text name="regmname"><br>
                    Last<br><input type=text name="reglname"><br><br>
                    Address:<br><textarea style="width:173px; height:50px;" name="regaddress"></textarea><br>
                    Birthday:<br><input type=date name="regage"><br><br>
                    Picture:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="image"><br><br>
                    <input type=submit value="Submit" class="btnlogin"><br>
                    </center>
                </div>
            </form>
            <form action="http://localhost/baskogsportswear/index.php" method="Post"><br>
                <center><input class="btncancel" type=submit value=Cancel ><br></center>
            </form>
        </div>   
    </body>
</html>