<?php

    $signin_email=test_input($_POST);

    if(empty($signin_email) && empty($signin_password))
    {
    echo "All field Required";
    }
    else
    {
    if(empty($signin_email))
    {
        echo "Email Required";
    }
    else if(empty($signin_password))
    {
        echo "Password Required";
    }
    else
    {
        $query="select * from user where email='".$signin_email."'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_array($result);
        if($row)
        {
            if(password_verify($signin_password,$row['password']))
            {
                echo "success";
            }
            else
            {
                echo "Invailid Username or Password";
            }
        }
        else
        {
            echo "Invailid Username or Password";
        }
    }
    }


    function test_input($data) {
        foreach ($postData as $data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    
?>