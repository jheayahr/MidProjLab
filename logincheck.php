<?php
session_start();
        $servername = "localhost";
        $username = "root";
        $password = "foo.bar143";
        $dbname = "baskogsportsweear";
        $Tquery = "SELECT * FROM `tailor`";
        $Aquery = "SELECT * FROM `administrator`";
        $loggedin = $_POST['loggedin'];
        
        

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result1 = mysqli_query($conn, $Tquery);
        $resulta = mysqli_query($conn, $Aquery);

        if(!empty($_POST)){
        $user = $_POST['user']; 
        $pw = $_POST['password']; 
            if($loggedin == 'Admin'){
                while($row = mysqli_fetch_assoc($resulta)){
                    if($row['AdminUser'] == $user && $row['AdminPass'] == $pw){
                    $_SESSION['firstname'] = $row['AdminFName'];
                    $_SESSION['lastname'] = $row['AdminLName'];
                    $_SESSION['admin'] = $_POST['loggedin'];
                    $_SESSION['loggedin'] = $loggedin;
                    header('Location: http://localhost/baskogsportswear/home.php');
                    }else{
                        echo 'The username or password are incorrect! Please go back to the previous page to login again.';
                    }
                }   
            }elseif($loggedin == 'User'){
                while($row = mysqli_fetch_assoc($result1)){
                    if($row['TUser'] == $user && $row['TPass'] == $pw){
                    $_SESSION['firstname'] = $row['TFName'];
                    $_SESSION['lastname'] = $row['TLName'];
                    $_SESSION['lulz']= $row['TailorID'];
                    $_SESSION['loggedin'] = $loggedin;
                    $_SESSION['admin'] = $_POST['loggedin'];
                    header('Location: http://localhost/baskogsportswear/home.php');       
                    }else{
                       echo 'The username or password are incorrect! Please go back to the previous page to login again.'; 
                    }   
                }   
            }        
        }
?>