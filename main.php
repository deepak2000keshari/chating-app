<?php 
class Main
{
  function  __construct(){
      
  }
   public static function signup()
   {
    include('css.php');
    $main=include('signup.php');
    include('footer.php');
   }
   public static function signin()
   {
    include('css.php');
    include('signin.php');
    include('footer.php');
   }
  
}


Main::signup();
?>