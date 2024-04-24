<?php
@include 'config.php';

session_start();


if (isset($_SESSION['reset_token'])) {
    $resetToken = mysqli_real_escape_string($conn, $_GET['token']);

    if ($_SESSION['reset_token'] === $resetToken) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style-logowanie.css">
            <title>Zresetuj hasło</title>
        </head>
        <body>
            <div class="form-container">
                <form action="reset-password-form.php" method="post">
                    <h3 class="title">Zresetuj hasło</h3>

                    <input type="hidden" name="token" value="<?php echo $resetToken; ?>">

                    <div class="text">Nowe hasło:</div>
                    <input type="password" name="new_password" placeholder="Nowe hasło" class="box" required>

                    <div class="text">Potwierdź nowe hasło:</div>
                    <input type="password" name="confirm_password" placeholder="Potwierdź nowe hasło" class="box" required>

                    <input type="submit" value="Zresetuj hasło" class="form-btn" name="submit">
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {

        echo "Nieprawidłowy token.";
    }
} else {
    echo "Brak wymaganych danych.";
}
?>
