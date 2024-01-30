<?php

@include 'config.php';
session_start();
if(isset($_POST['submit'])){

  $email = mysqli_real_escape_string($conn, $_POST['usermail']);
  $pass = md5($_POST['password']);
  $cpass = md5($_POST['cpassword']);
  $admin = "NIE";
  $firma="NIE";
  $firma1="TAK";

  $select = " SELECT * FROM konto WHERE email = '$email' AND haslo = '$pass'";


  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result) > 0){
    $error[] = 'Na tym mailu jest już założone konto!';
  }else{
    if($pass != $cpass){
      $error[] = 'Hasła nie są takie same!';
    }else{
      if (isset($_POST['checkboxfirma']) && $_POST['checkboxfirma'] == 1):
        $firma = 'TAK';
      else:
        $firma = 'NIE';
      endif;
      $insert = "INSERT INTO konto(email, haslo, admin, firma) VALUES('$email','$pass','$admin','$firma')";
      mysqli_query($conn, $insert);
      header('location:login_form.php');
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
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="form-container">

    <form action="" method="post">
      <h3 class="title">Rejestracja</h3>

      <?php
        if(isset($error)){
          foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
          }
        }
      ?><div class="textt">
        Podaj e-mail:</div>

      <input type="email" name="usermail" placeholder="Wpisz tutaj swoj e-mail" class="box" required><br>
      <div class="textt"> Podaj hasło: </div><input type="password" name="password" placeholder="Wpisz tutaj swoje hasło" class="box" required><br>
      <div class="textt"> Powtórz hasło: </div><input type="password" name="cpassword" placeholder="Powtórz hasło które wpisałeś powyżej" class="box" required><br>
      <input type="checkbox" name="checkboxfirma" value="1" id="checkboxfirma"><label for="checkboxfirma">Zarejestruj jako firma</label><br>
      <input type="submit" value="Zarejestruj się!" class="form-btn" name="submit">
      <p>Masz już konto?<a href="login_form.php">Zaloguj się!</a></p>
    </form>

  </div>
</body>
</html>
