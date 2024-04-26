<?php
@include '../config.php';
session_start();
session_destroy();
header('location:/system_ogloszeniowy-Internetowe-/logowanie/login_form.php');
?>