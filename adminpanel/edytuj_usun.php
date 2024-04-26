<?php
@include '../config.php';
if($_GET['edit'] != "")
{
    $query = "UPDATE `". $_GET['tabela']."` SET `". $_GET['tabela'] ."`='". $_GET['nazwa'] ."' WHERE id = ". $_GET['id'];
    $result = $conn->query($query);
    header('location:../adminpanel/admin-panel.php');
}
else if ($_GET['delete'] != "")
{
    $query = "DELETE FROM `".$_GET['tabela'] ."` WHERE id = ". $_GET['id'];
    $result = $conn->query($query);
    header('location:../adminpanel/admin-panel.php');
}
if($_GET['edit'] != "")
{
    $query = "UPDATE `". $_GET['tabela']."` SET `". $_GET['tabela'] ."`='". $_GET['nazwa'] ."' WHERE id = ". $_GET['Id'];
    $result = $conn->query($query);
    header('location:../adminpanel/admin-panel.php');
}
else if ($_GET['delete'] != "")
{  
    $query = "DELETE FROM `".$_GET['tabela'] ."` WHERE id = ". $_GET['Id'];
    $result = $conn->query($query);
    header('location:../adminpanel/admin-panel.php');
}
?>