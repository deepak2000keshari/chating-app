<?php 

    require_once('conection.php');

    $user='root';
    $pass='';
    $servername='localhost';
    $db='massenger';
    $conn = mysqli_connect($servername, $user, $pass,$db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


?>