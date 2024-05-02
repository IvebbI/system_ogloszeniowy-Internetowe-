<?php
@include '../../connection/index.php';
$kategoria = $_GET['kategoria'];
$valuekategoria = $_GET['valuekategoria'];
$query = "INSERT INTO `$kategoria`(`{$_GET['kategoria']}`) VALUES ('$valuekategoria')";
$result = $conn->query($query);
header('location:../adminpanel/');
?>