<?php
session_start();
if(!isset($_SESSION['czyadmin']) || $_SESSION['czyadmin']=='nie'){
    header('location:/system_ogloszeniowy-Internetowe-/glowna.php');
}
?>