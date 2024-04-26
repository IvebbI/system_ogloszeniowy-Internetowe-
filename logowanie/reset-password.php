<?php
@include '../config.php';
require 'SMTP.php';
require 'PHPMailer.php';
require 'Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['usermail']);

    $select = "SELECT * FROM konto WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userid = $row['Id']; 

        $resetToken = bin2hex(random_bytes(16));

        $_SESSION['reset_token'] = $resetToken;
        $_SESSION['reset_userid'] = $userid;
        $_SESSION['reset_email'] = $email;

        $resetLink = 'http://localhost/system_ogloszeniowy-Internetowe-/logowanie/reset-password-confirm.php?token=' . $resetToken;

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'projektofertypracy123545@outlook.com';
            $mail->Password = 'Haslo12345';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->SMTPDebug = 2;
            $mail->setFrom('projektofertypracy123545@outlook.com', 'Projekt Oferty Pracy');
            $mail->addAddress($email);
            $mail->isHTML(true);

            $mail->Subject = 'Resetowanie hasła';
            $mail->Body = 'Aby zresetować hasło, kliknij poniższy link: <br>' . $resetLink;

            $mail->send();

            echo "<script>alert('Na podany adres e-mail został wysłany link resetujący hasło.'); window.location.href='http://localhost/system_ogloszeniowy-Internetowe-/glowna.php';</script>";
            exit;
        } catch (Exception $e) {
            $error[] = "Wystąpił błąd podczas wysyłania wiadomości: {$mail->ErrorInfo}";
        }
    } else {
        $error[] = 'Brak konta powiązanego z podanym adresem e-mail.';
    }
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-logowanie.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="post">
            <h3 class="title">Resetowanie hasła</h3>

            <?php
            if (isset($error)) {
                foreach ($error as $errorMessage) {
                    echo '<span class="error-msg">' . $errorMessage . '</span>';
                }
            }
            ?>

            <div class="textt">Podaj e-mail powiązany z Twoim kontem:</div>
            <input type="email" name="usermail" placeholder="Wpisz tutaj swój adres e-mail" class="box" required>

            <input type="submit" value="Wyślij link resetujący" class="form-btn" name="submit">
            <p>Powrót do <a href="login_form.php">logowania</a>.</p>
        </form>
    </div>
</body>

</html>
