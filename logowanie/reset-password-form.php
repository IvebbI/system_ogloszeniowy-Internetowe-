<?php
@include 'config.php';

session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("location: localhost/system_ogloszeniowy-Internetowe-/glowna.php");
    exit;
}

if (isset($_POST['submit'])) {
    if (isset($_SESSION['reset_token'])) {
        $userid = $_SESSION['reset_userid']; 
        $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

        if ($new_password === $confirm_password) {
            
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update = "UPDATE konto SET haslo = '$hashed_password' WHERE Id = '$userid'";
            mysqli_query($conn, $update);

       
            echo "Hasło zostało zresetowane pomyślnie.";


         
            echo "<script>alert('Hasło zresetowane pomyślnie'); window.location.href='http://localhost/system_ogloszeniowy-Internetowe-/logowanie/login_form.php';</script>";
            exit;
        } else {
            echo "Hasła nie są identyczne.";
        }
    } else {
        echo "Brak autoryzacji.";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
</body>
</html>
