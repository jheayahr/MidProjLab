<?php
    $host = 'localhost';
    $user = 'root';
    $pass = 'foo.bar143';

    mysql_connect($host, $user, $pass);

    mysql_select_db('test');

    $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
    $image_name = addslashes($_FILES['image']['name']);
    $sql = "INSERT INTO `image_table` (`id`, `image`, `image_name`) VALUES ('1', '{$image}', '{$image_name}')";
    header("location: http://localhost/baskogsportswear/showimage.php");
    if (!mysql_query($sql)) { // Error handling
        echo "Something went wrong! :("; 
    }
?>