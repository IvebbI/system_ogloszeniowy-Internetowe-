<?php
  session_start();
  if(!isset($_SESSION['id'])){
     header('location:/system_ogloszeniowy-Internetowe-/logowanie/login_form.php');
  }
 

?>