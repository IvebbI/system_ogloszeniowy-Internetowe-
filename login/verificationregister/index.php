<?php
@include '../../connection/index.php';
session_start();

if (isset($_GET['verification_code']) && isset($_GET['usermail'])) {
    $email = mysqli_real_escape_string($conn, $_GET['usermail']);
    $kodWeryfikacyjny = mysqli_real_escape_string($conn, $_GET['verification_code']);

    // Pobierz stare dane zweryfikacyjnego kodu z bazy
    $select = "SELECT zweryfikowany FROM konto WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $oldVerificationStatus = $row['zweryfikowany'];

        // Sprawdź, czy użytkownik już nie został zweryfikowany
        if ($oldVerificationStatus === 'TAK') {
            echo "Twoje konto zostało już zweryfikowane!";
            exit;
        }

        // Sprawdź, czy kod weryfikacyjny jest poprawny
        if ($kodWeryfikacyjny == $_GET['verification_code']) {
            $insert = "UPDATE konto SET zweryfikowany='TAK' WHERE email='$email'";
            $result = mysqli_query($conn, $insert);

            if ($result) {
                echo "Twoje konto zostało pomyślnie zweryfikowane!";
                exit;
            } else {
                echo "Błąd podczas aktualizowania danych w bazie: " . mysqli_error($conn);
            }
        } else {
            echo "Nieprawidłowy kod weryfikacyjny!";
        }
    } else {
        echo "Nieprawidłowy adres e-mail lub użytkownik nie istnieje!";
    }
} else {
    echo "Brak kodu weryfikacyjnego lub adresu e-mail!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../loginstyle/style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3 class="title">Potwierdzenie kodem weryfikacyjnym</h3>

            <?php
            if (isset($error)) {
                foreach ($error as $errorMessage) {
                    echo '<span class="error-msg">' . $errorMessage . '</span>';
                }
            }
            ?>

            <div class="textt">Podaj kod weryfikacyjny:</div>
            <input type="text" name="verification_code" placeholder="Wpisz kod weryfikacyjny wysłany na podany e-mail" class="box" required><br>
            <input type="hidden" name="usermail" value="<?php echo isset($_GET['usermail']) ? $_GET['usermail'] : ''; ?>">
            <input type="submit" value="Potwierdź!" name="submit" class="form-btn">
        </form>
    </div>
</body>
</html>
