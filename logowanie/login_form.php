<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

  $email = mysqli_real_escape_string($conn, $_POST['usermail']);
  $pass = md5($_POST['password']);
  // Check if email is valid
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error = 'Nieprawidłowy adres e-mail!';
  }
  if(!isset($error)){
    // Check if user exists in database
    $select = "SELECT * FROM konto WHERE email = '$email' AND haslo = '$pass'";

    $result = $conn -> query($select) -> fetch_assoc();
    $_SESSION['usermail'] =  $result['email'];
    $_SESSION['czyfirma'] = $result['firma'];
    $_SESSION['czyadmin'] = $result['admin'];


    header('location:/system_ogloszeniowy-Internetowe-/glowna.php');
  }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="form-container">

    <form action="" method="post">
      <h3 class="title">Logowanie</h3>

      <?php
        if(isset($error)){
          foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
          }
        }
      ?>

      <div class="textt">Podaj e-mail:</div>
      <input type="email" name="usermail" placeholder="Wpisz tutaj swoj e-mail" class="box" required><br>
      <div class="textt"> Podaj hasło: </div><input type="password" name="password" placeholder="Wpisz tutaj swoje hasło" class="box" required><br>
      <input type="submit" value="Zaloguj się!" name="submit" class="form-btn">
      <p>Nie masz konta?<a href="register_form.php">Zarejestruj się!</a></p>
    </form>

  </div>

</body>
</html>
