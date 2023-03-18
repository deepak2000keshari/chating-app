<?php 
session_start();
date_default_timezone_set("Asia/Kolkata");
if(isset($_GET))
{
    include('conection.php');
    $query='UPDATE user SET status=0,last_seen="'.date('Y-m-d H:i:s').'" where email="'.$_SESSION["email"].'"';
    $result=mysqli_query($conn,$query);
    if($result)
    {
        echo 1;
        session_destroy();
    }
    else
    {
        0;
    }
}
?>