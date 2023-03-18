<?php
    include('conection.php');
    $signin_email=test_input($_POST['signin_email']);
    $signin_password=test_input($_POST['signin_password']);

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
            // print_r($row);
            // exit();
            if(password_verify($signin_password,$row['password']))
            {
                echo "success";
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['email']=$signin_email;
                $_SESSION['username']=ucwords($row['user_name']);
                $_SESSION['Phone']=$row['phone'];
                $_SESSION['dob']=$row['dob'];
                if($row['profile']=='')
                {
                    $name=explode(' ',$_SESSION['username']);
                    $row['profile']='https://ui-avatars.com/api/?name='.$name[0].'+'.$name[1].'&rounded=true';
                }
                $_SESSION['profile']=$row['profile'];
                $query="update user Set status=1 where email='".$signin_email."'";
                $result=mysqli_query($conn,$query);
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
        
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        
    }

    // function profile_image($name)
    // {
    //  $name=explode(' ',$name);
    //  $curl = curl_init();
    //  curl_setopt_array($curl, array(
    //  CURLOPT_URL => 'https://ui-avatars.com/api/?name='.$name[0].'+'.$name[1].'&rounded=true',
    //  CURLOPT_RETURNTRANSFER => true,
    //  CURLOPT_ENCODING => '',
    //  CURLOPT_MAXREDIRS => 10,
    //  CURLOPT_TIMEOUT => 0,
    //  CURLOPT_FOLLOWLOCATION => true,
    //  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //  CURLOPT_CUSTOMREQUEST => 'GET',
    //  ));
    //  $response = curl_exec($curl);
    //  curl_close($curl);
    //  return $response;
    // }
    
?>