<?php
   include "../Classess/User.php";
   
   # create an object 
   $user = new User;
   
   # call the store method
   $user->store($_POST);
   
?>