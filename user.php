<?php
include('conection.php');
$signup_name=test_input($_POST['signup_name']);
$signup_email=test_input($_POST['signup_email']);
$signup_password= password_hash(test_input($_POST['signup_password']), PASSWORD_DEFAULT);
$signup_phone=test_input($_POST['signup_phone']);
$signup_date=test_input($_POST['signup_date']);

if(empty($signup_name) && empty($signup_email) && empty($signup_password) && empty($signup_phone) && empty($signup_date))
{
    echo "Please fill all the fields";
}
else
{
    if(empty($signup_name))
    {
        echo "Please enter your name";
    }
    else if(empty($signup_email))
    {
        echo "Please enter your email";
    }
    else if(empty($signup_password))
    {
        echo "Please enter your password";
    }
    else if(empty($signup_phone))
    {
        echo "Please enter your phone number";
    }
    else if(empty($signup_date))
    {
        echo "Please enter your date";
    }
    else
    {
        $query="select * from user where email='".$signup_email."'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==0)
        {
          $query="insert into user (user_name, email, password, phone, dob) values ('$signup_name','$signup_email','$signup_password','$signup_phone','$signup_date')";
          $result=mysqli_query($conn,$query);
          if($result)
          {
            echo "Signup success";
          }
          else
          {
            echo "Signup failed ".mysqli_error($conn);
          }
        }
        else
        {
            echo "Email already exist";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>