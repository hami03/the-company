<?php
   include '../Classess/User.php';

   # create an object
   $user = new User;

   # call the method
   $user->login($_POST);
   
?>