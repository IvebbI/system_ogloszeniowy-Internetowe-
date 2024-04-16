<?php
if($_GET['edit'] != "")
{
    $conn = mysqli_connect('localhost','root','','baza_systemogloszeniowy');

    $query = "UPDATE `". $_GET['tabela']."` SET `". $_GET['tabela'] ."`='". $_GET['nazwa'] ."' WHERE id = ". $_GET['id'];
    $result = $conn->query($query);
    header('location:../adminpanel/admin-panel.php');
}
else if ($_GET['delete'] != "")
{
    $conn = mysqli_connect('localhost','root','','baza_systemogloszeniowy');

    $query = "DELETE FROM `".$_GET['tabela'] ."` WHERE id = ". $_GET['id'];
    $result = $conn->query($query);
    header('location:../adminpanel/admin-panel.php');
}
?>