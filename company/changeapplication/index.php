<?php
session_start();
@include '../../connection/index.php';
if(isset($_GET['delete']))
{
    $sql = "DELETE FROM `aplikacja` where id = ".$_GET['idAplikacji'];
    $conn ->query($sql);
    header('location:../companypanel/');
} 
if(isset($_GET['change_status']))
{
    $status = "APLIKOWANE";
    if($_GET['status'] == "APLIKOWANE")
    {
        $status = "NIEAPLIKOWANE";
    }
    
    $sql = "UPDATE `aplikacja` SET `status`='".$status ."' WHERE id = ". $_GET['idAplikacji'];
    $conn -> query($sql);
    header('location:../companypanel/');
}
?>