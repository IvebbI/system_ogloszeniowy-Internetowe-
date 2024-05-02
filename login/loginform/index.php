<?php

@include '../../connection/index.php';

session_start();

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['usermail']);
    $password = md5($_POST['password']);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = 'Nieprawidłowy adres e-mail!';
    }

    if(!isset($error)){
        $select = "SELECT * FROM konto WHERE email = '$email'";
        $result = $conn->query($select);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($_POST['password'], $row['haslo'])) {
                $_SESSION['id'] =  $row['Id'];
                $_SESSION['czyfirma'] = $row['firma'];
                $_SESSION['czyadmin'] = $row['admin'];  

                if ($_SESSION['czyfirma'] == 'TAK') {
                    $sql = "SELECT * FROM firma WHERE konto_id = {$_SESSION['id']}";
                    $return = $conn->query($sql);
                    $firmaData = $return->fetch_assoc();
                    $_SESSION['firma_id'] = $firmaData['id'];
                }

                header('location:../../main/index.php');
                exit;
            } else {
                $error = 'Nieprawidłowe hasło!';
            }
        } else {
            $error = 'Nieprawidłowy adres e-mail lub użytkownik nie istnieje!';
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
  <link rel="stylesheet" href="../loginstyle/style.css">
</head>
<body>
  <div class="form-container">

    <form action="" method="post">
      <h3 class="title">Logowanie</h3>

      <?php
        if(isset($error)){
          if(is_array($error) || is_object($error)){
            foreach($error as $errorItem){
              echo '<span class="error-msg">'.$errorItem.'</span>';
            }
          } else {
            echo '<span class="error-msg">'.$error.'</span>';
          }
        }
      ?>

      <div class="textt">Podaj e-mail:</div>
      <input type="email" name="usermail" placeholder="Wpisz tutaj swoj e-mail" class="box" required><br>
      <div class="textt"> Podaj hasło: </div><input type="password" name="password" placeholder="Wpisz tutaj swoje hasło" class="box" required><br>
      <div class="przywroc-haslo">Nie pamiętasz hasła?<a href="../resetpassword/index.php" class="margin-left-10">Zresetuj hasło</a><br></div>
      <input type="submit" value="Zaloguj się!" name="submit" class="form-btn">
      <p>Nie masz konta?<a href="../registerform/index.php" class="margin-left-10">Zarejestruj się!</a></p>
    </form>

  </div>

</body>
</html>
