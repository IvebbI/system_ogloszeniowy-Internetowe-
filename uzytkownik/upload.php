<?php
session_start();
    // assume you have a database named 'blob'
    $conn = mysqli_connect("localhost", "root", "", "baza_systemogloszeniowy");
    $image = $_FILES["image"];
    $info = getimagesize($image["tmp_name"]);
    if(!$info)
    {
        die("Plik nie jest obrazem");
    }
    $name = $image["name"];
    $type = $image["type"];
    $user_id = $_SESSION["id"];
    $blob = addslashes(file_get_contents($image["tmp_name"]));
    $sql="UPDATE `images` SET `image`='".$blob."',`name`= '".$name."',`type`= '".$type."' WHERE id=$user_id";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    echo "Plik zaktualizowany";
?>