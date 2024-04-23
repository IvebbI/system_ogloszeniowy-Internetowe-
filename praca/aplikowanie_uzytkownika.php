<?php
session_start();
$conn = mysqli_connect('localhost','root','','baza_systemogloszeniowy');


$sql="INSERT INTO `aplikacja`(id,`id_uzytkownika`, `id_ogloszenia`, `status`) VALUES (null,'".$_SESSION['id']."','".$_GET['idogloszenia']."','APLIKOWANE')";
echo $sql;
$return = $conn->query($sql);
header('location:../praca/szczegolyoferty.php?id='.$_GET['idogloszenia']);
?>