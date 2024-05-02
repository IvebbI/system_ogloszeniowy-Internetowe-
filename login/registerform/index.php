<?php
@include '../../connection/index.php';
require '../SMTP.php';
require '../PHPMailer.php';
require '../Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

function generujKodWeryfikacyjny() {
    return rand(100000, 999999);
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['usermail']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['cpassword'];
    $admin = "NIE";
    $firma = isset($_POST['checkboxfirma']) && $_POST['checkboxfirma'] == 1 ? 'TAK' : 'NIE';

    $kodWeryfikacyjny = generujKodWeryfikacyjny();

    $_SESSION['registration_data'] = [
        'usermail' => $email,
        'password' => $password,
        'cpassword' => $confirmPassword,
        'checkboxfirma' => $firma,
        'verification_code' => $kodWeryfikacyjny,
    ];

    $select = "SELECT * FROM konto WHERE email = ?";
    $stmt = $conn->prepare($select);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error[] = 'Na tym mailu jest już założone konto!';
    } else {
        if ($password != $confirmPassword) {
            $error[] = 'Hasła nie są takie same!';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $zweryfikowany = "NIE";
            $insert = "INSERT INTO konto(email, haslo, admin, firma, zweryfikowany) VALUES(?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert);
            $stmt->bind_param("sssss", $email, $hashedPassword, $admin, $firma, $zweryfikowany);
            $stmt->execute();
            $lastInsertedId = $stmt->insert_id;

            $insertFirma = "INSERT INTO firma(konto_id) VALUES (?)";
            $stmt = $conn->prepare($insertFirma);
            $stmt->bind_param("i", $lastInsertedId);
            $stmt->execute();

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

                $mail->Subject = 'Kod weryfikacyjny rejestracji';
                $mail->Body = "Twój kod weryfikacyjny to: $kodWeryfikacyjny";

                $mail->send();

                header('location: ../verificationregister/');
                exit;
            } catch (Exception $e) {
                $error[] = "Wystąpił błąd podczas wysyłania wiadomości: {$mail->ErrorInfo}";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../loginstyle/style.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="post">
            <h3 class="title">Rejestracja</h3>

            <?php
            if (isset($error)) {
                foreach ($error as $errorMessage) {
                    echo '<span class="error-msg">' . $errorMessage . '</span>';
                }
            }
            ?>

            <div class="textt">Podaj e-mail:</div>
            <input type="email" name="usermail" placeholder="Wpisz tutaj swoj e-mail" class="box" required>

            <div class="textt">Podaj hasło:</div>
            <input type="password" name="password" placeholder="Wpisz tutaj swoje hasło" class="box" required>

            <div class="textt">Powtórz hasło:</div>
            <input type="password" name="cpassword" placeholder="Powtórz hasło które wpisałeś powyżej" class="box" required>

            <div class="checkbox-container">
                <input type="checkbox" name="checkboxfirma" value="1" id="checkboxfirma">
                <label class="checkbox-label" for="checkboxfirma">Zarejestruj jako firma</label>
            </div>

            <input type="submit" value="Zarejestruj się!" class="form-btn" name="submit">
            <p>Masz już konto? <a href="../loginform/">Zaloguj się!</a></p>
        </form>
    </div>
</body>

</html>
