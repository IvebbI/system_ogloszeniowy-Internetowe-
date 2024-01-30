<?php
  session_start();
  if(!isset($_SESSION['usermail'])){
     header('location:/system_ogloszeniowy-Internetowe-/logowanie/login_form.php');
  }
 

?>