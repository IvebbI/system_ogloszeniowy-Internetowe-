<?php
@include '../config.php';
$kategoria = $_GET['kategoria'];
$valuekategoria = $_GET['valuekategoria'];
$query = "INSERT INTO `$kategoria`(`{$_GET['kategoria']}`) VALUES ('$valuekategoria')";
$result = $conn->query($query);
header('location:../adminpanel/admin-panel.php');
?>