<?php
    session_start();
    $host = 'localhost';
    $user = 'root';
    $pass = 'foo.bar143';
    $loggedid = $_SESSION['loggedin'];
    $id = $_SESSION['lulz'];    
    mysql_connect($host, $user, $pass);
    mysql_select_db('baskogsportsweear');
    
    if ($loggedid == 'User'){
        $sql = "SELECT TPic FROM tailor WHERE TailorID = '$id'";
    }else{
        $sql = "SELECT AdminPic FROM administrator WHERE  AdminFName = 'Business'";
    }
    
    $result = mysql_query("$sql"); 
    header("Content-type: image/jpeg");
    echo mysql_result($result, 0);
    mysql_close($link);
?>