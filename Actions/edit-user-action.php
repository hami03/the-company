<?php
  include '../Classess/User.php';

  $user = new User;

  $user->update($_POST, $_FILES);
?>