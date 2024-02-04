<?php
@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['usermail']);
    $kodWeryfikacyjny = $_POST['verification_code'];

    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Nieprawidłowy adres e-mail!';
    }

    if (!isset($error)) {
        // Check if user exists in database
        $select = "SELECT * FROM konto WHERE email = '$email' AND kod_weryfikacyjny = '$kodWeryfikacyjny'";
        $result = mysqli_query($conn, $select);

        if ($result) {
            $userData = mysqli_fetch_assoc($result);

            if ($userData) {
                // Dodaj dane do bazy podczas weryfikacji
                $admin = "NIE";
                $firma = isset($_SESSION['registration_data']['checkboxfirma']) && $_SESSION['registration_data']['checkboxfirma'] == 1 ? 'TAK' : 'NIE';
                $hashedPassword = $userData['haslo']; // Pobierz hasło z bazy danych

                $insert = "INSERT INTO konto(email, haslo, admin, firma, kod_weryfikacyjny) VALUES('$email','$hashedPassword','$admin','$firma', '$kodWeryfikacyjny')";
                $result_insert = mysqli_query($conn, $insert);

                if ($result_insert) {
                    $_SESSION['id'] =  $userData['id'];
                    $_SESSION['czyfirma'] = $firma; // Ustaw wartość czyfirma na $firma
                    $_SESSION['czyadmin'] = $admin; // Ustaw wartość czyadmin na $admin

                    header('location:/system_ogloszeniowy-Internetowe-/glowna.php');
                    exit;
                } else {
                    $error[] = 'Błąd podczas dodawania danych do bazy: ' . mysqli_error($conn);
                }
            } else {
                $error[] = 'Nieprawidłowy kod weryfikacyjny!';
            }
        } else {
            $error[] = 'Błąd w zapytaniu SQL: ' . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-logowanie.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="post">
            <h3 class="title">Logowanie</h3>

            <?php
            if (isset($error)) {
                foreach ($error as $errorMessage) {
                    echo '<span class="error-msg">' . $errorMessage . '</span>';
                }
            }
            ?>

            <div class="textt">Podaj kod weryfikacyjny:</div>
            <input type="text" name="verification_code" placeholder="Wpisz kod weryfikacyjny wysłany na podany e-mail" class="box" required><br>
            <input type="submit" value="Potwierdź!" name="submit" class="form-btn">
        </form>
    </div>
</body>

</html>
