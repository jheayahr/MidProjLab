<?php
        $servername = "localhost";
        $username = "root";
        $password = "foo.bar143";
        $dbname = "baskogsportsweear";
        

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            $new_date = date('m-d-Y', strtotime($_POST['regage']));
            $birthDate = $new_date;
            //explode the date to get month, day and year
            $birthDate = explode("-", $birthDate);
            //get age from date or birthdate
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));

       
        $fname = $_POST['regfname'];
        $mname = $_POST['regmname'];
        $lname = $_POST['reglname'];
        $add = $_POST['regaddress'];
        $age = $age;
        $user = $_POST['reguser'];
        $pass = $_POST['regpass'];
        
        $DBhost = 'localhost';
        $DBuser = 'root';
        $DBpass = 'foo.bar143';

        mysql_connect($DBhost, $DBuser, $DBpass);
        mysql_select_db('baskogsportsweear');

        $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
        $image_name = addslashes($_FILES['image']['name']);
        
        $sql = "INSERT INTO tailor (TFName, TMName, TLName, TailorAdd, TailorAge, TUser, TPass, TPic, TPicName) 
        VALUES ('$fname', '$mname', '$lname','$add', '$age', '$user', '$pass', '$image','$image_name')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header('Location: http://localhost/baskogsportswear/index.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }   

        $conn->close();  
        
?>

    