<?php
@include '../../connection/index.php';
session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['usermail']);
    $kodWeryfikacyjny = mysqli_real_escape_string($conn, $_POST['verification_code']);
    $oldVerificationCode = $_GET['verification_code'];

    if ($kodWeryfikacyjny == $oldVerificationCode) {
        $admin = "NIE";

        $insert = "UPDATE konto SET zweryfikowany='TAK' WHERE email='$email'";
        $result = mysqli_query($conn, $insert);

        if ($result) {
            $select = "SELECT * FROM konto WHERE email = '$email'";
            $result_select = mysqli_query($conn, $select);
            if ($result_select) {
                $userData = mysqli_fetch_assoc($result_select);

                session_destroy();

                header('location:../../main/');
                exit;
            } else {
                $error[] = 'Błąd podczas pobierania danych z bazy: ' . mysqli_error($conn);
            }
        } else {
            $error[] = 'Błąd podczas aktualizowania danych w bazie: ' . mysqli_error($conn);
        }
    } else {
        $error[] = 'Nieprawidłowy kod weryfikacyjny!';
    }
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
