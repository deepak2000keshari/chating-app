<?php 
session_start();
if(isset($_GET))
{
    include('conection.php');
    $query='UPDATE user SET status=0 where email="'.$_SESSION["email"].'"';
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