<?php

@include 'config.php';

session_start();

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
        if(isset($error)){
          foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
          }
        }
      ?>

      <div class="textt">Podaj e-mail:</div>
      <input type="email" name="usermail" placeholder="Wpisz tutaj swoj e-mail" class="box" required><br>
      <input type="submit" value="Przejdź dalej!" name="submit" class="form-btn">
    </form>

  </div>

</body>
</html>
