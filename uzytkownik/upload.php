<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "baza_systemogloszeniowy");

$image = $_FILES["image"];
$info = getimagesize($image["tmp_name"]);

if(!$info) {
    die("Plik nie jest obrazem");
}

$name = $image["name"];
$type = $image["type"];
$user_id = $_SESSION["id"];
$blob = addslashes(file_get_contents($image["tmp_name"]));

$check_query = "SELECT * FROM images WHERE id_uzytkownika = $user_id";
$check_result = mysqli_query($conn, $check_query);
if (mysqli_num_rows($check_result) > 0) {
    $sql = "UPDATE `images` SET `image`='$blob', `name`= '$name', `type`= '$type' WHERE id_uzytkownika=$user_id";
} else {
    $sql = "INSERT INTO `images` (`id_uzytkownika`, `image`, `name`, `type`) VALUES ($user_id, '$blob', '$name', '$type')";
}

mysqli_query($conn, $sql) or die(mysqli_error($conn));
header('location:/system_ogloszeniowy-Internetowe-/uzytkownik/profil.php');
?>
