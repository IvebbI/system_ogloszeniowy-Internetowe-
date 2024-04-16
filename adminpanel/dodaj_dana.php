<?php
$conn = mysqli_connect('localhost','root','','baza_systemogloszeniowy');

$query = "INSERT INTO `". $_GET["kategoria"] ."`(`kategoria`) VALUES ('".$_GET['valuekategoria']."')";
$result = $conn->query($query);
header('location:../adminpanel/admin-panel.php');
?>