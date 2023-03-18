<?php 
session_start();
if(isset($_GET['id']))
{
    include('conection.php');
    $query='UPDATE msg SET seen_status=1 where id="'.$_GET["id"].'"';
    $result=mysqli_query($conn,$query);
    if($result)
    {
        echo 1;
    }
    else
    {
        0;
    }
}
?>