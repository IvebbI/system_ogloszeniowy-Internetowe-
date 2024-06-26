<?php
  session_start();
  @include '../../connection/index.php';

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>System Ogłoszeniowy</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="../../main/style.css" />
  <link rel="stylesheet" href="../companystyle/style.css" />
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light bg-light mb-5">
    <a href="../../main/" class="navbar-brand mx-3">
      <img class="d-inline-block align-top" src="../../images/logo.jpg" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item custom-link1">
          <a href="../../main/" class="nav-link">
            Główna
          </a>
        </li>
        <li class="nav-item custom-link1">
          <a href="../../job/offers/" class="nav-link  ">
            Oferty pracy
          </a>
        </li>
        <?php
              if(isset($_SESSION['id'])){
                echo <<<html
                <li class="nav-item custom-link1">
                  <a href="../../user/profile/" class="nav-link ">
                    Mój profil
                  </a>
                </li>
                html;
              }
          ?>
          
      </ul>
   
      <ul class="navbar-nav ms-auto">

      <?php
      if(isset($_SESSION['czyadmin']) && $_SESSION['czyfirma']=='TAK'){
        echo <<<html
    <li class="nav-item">
      <a href="../addoffer/" class="nav-link custom-link me-2 ">
        Dodaj ogłoszenie
        <img class="d-inline-block align-top" src="../../images/icon_add.png" style="height: 20px;" />
      </a>
    </li>
    html;
  }
          if(isset($_SESSION['czyadmin']) && $_SESSION['czyfirma']=='TAK'){
            echo <<<html
        <li class="nav-item">
          <a href="" class="nav-link custom-link me-2  active">
            Panel Firmy
            <img class="d-inline-block align-top" src="../../images/company.png" style="height: 20px;" />
          </a>
        </li>
        html;
      }
      if(isset($_SESSION['czyadmin']) && $_SESSION['czyadmin']=='TAK'){
        echo <<<html
        <li class="nav-item">
        <a href="../../admin/adminpanel/" class="nav-link custom-link me-2 ">
          Panel Admin
          <img class="d-inline-block align-top" src="../../images/adminpanelzdj.png" style="height: 30px;" />
        </a>
      </li>
    html;
  }
  if (!isset($_SESSION['id'])) {
    echo <<<html
        <a href="../../login/loginform/" class="nav-link custom-link me-2">
            Zaloguj się
        </a>
    html;
    echo <<<html
    <a href="../../login/registerform/" class="zarejestruj-btn nav-link custom-link me-2">
        Zarejestruj się
    </a>
  html;
  }
  if(isset($_SESSION['id'])){

    echo <<<html
<li class="nav-item">
  <a href="../../login/logout/" class="nav-link custom-link me-2">
    Wyloguj się
  </a>
</li>
html;
}
      
   

        ?>
      </ul>
    </div>
  </nav>
 
  <section id="works" class="works" style="margin-top:100px">
			<div class="container">
				<div class="section-header">
					<h2>Witaj w panelu firmy</h2>

					<p>Na tej stronie masz dostęp do wszystkich ważnych zarządzaniach stroną!</p>
                    <p>Uważaj na elementy zachowane na stronie ponieważ w łatwy sposób możesz usunąć ważne rzeczy</p>
		</section>
<?php
  
    $dsn = 'mysql:host=localhost;dbname=baza_systemogloszeniowy';
    $username = 'root';
    $password = '';
    
    try {
        $pdo = new PDO($dsn, $username, $password);
      
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = "SELECT * FROM ogloszenie WHERE id_firmy=:firmaID";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':firmaID', $_SESSION['firmaID']);
        $stmt->execute();
        
        echo "<table>";
        echo "<tr><th>ID</th><th>Nazwa Ogloszenia</th><th>Poziom Stanowiska</th><th>Akcje</th></tr>"; 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>{$row['id']}</td>
            <td><form method='GET' action='../editdelete'>
            <label>{$row['nazwa']}</label>
            <input type='hidden' name='id' value='{$row['id']}'>
            <input type='hidden' name='tabela' value='ogloszenie'>
            </td><td>
            {$row['poziom_stanowiska']}
            </td><td><center>
            <input type='submit' name='edit' value='Edytuj'  style='background-color: #f2f2f2; border: 1px solid black; width:70px;'>
            <input type='submit' name='delete' value='Usun'  style='background-color: #f2f2f2; border: 1px solid black; width:70px;'>
            </form></td></tr></center>";
        }
        echo "</table>";
        
        $pdo = null;
    } catch (PDOException $e) { 
        echo "Błąd połączenia z bazą danych: " . $e->getMessage();
    }

    $query = "SELECT * FROM aplikacja";
    $result = $conn->query($query);
    echo "
    
      <table>";
    while ($row = $result->fetch_array())
    {
      ?>
      <form method='get' action = '../changeapplication'>
          <tr><input type='hidden' name = 'idAplikacji' value='<?php echo $row['id']; ?> ' > 
          <td> 
            <input type='text' name='user' value =' <?php echo $row['id_uzytkownika']; ?>'>
          </td>
          <td>
              <input type = 'text' name='idogloszenia' value='<?php echo $row['id_ogloszenia'];?>'>
            </td>
              <td>
                <input type = 'text' name='status' value='<?php echo $row['status']; ?>'>
              </td>
              <td>
                <button name='change_status' type='submit'>zmien status</button></td><td><button name='delete' type='submit'>usun</button>
              </td>
            </tr>
            </form>    
      <?php
    }
    echo "</table>
    ";

?>










<footer class="text-center text-lg-start bg-light text-muted">
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"> 
  </section>
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Pracuj.pl
          </h6>
          <p>
            Tutaj możesz zobaczyć wszelkie informacje dotyczące naszej strony internetowej
          </p>
        </div>
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Oferty
          </h6>
          <p>
            <a href="#!" class="text-reset">Programista</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Informatyk</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Mechanik</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Sprzedawca</a>
          </p>
        </div>
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Przydatne linki
          </h6>
          <p>
            <a href="#!" class="text-reset">O nas</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Moje konto</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Oferty pracy</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Pomoc</a>
          </p>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4">Kontakt</h6>
          <p><i class="fas fa-home me-3"></i>Limanowa ul.Z augusta</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            pracujpl@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> +48 123456789</p>
          <p><i class="fas fa-print me-3"></i> +48 123456789</p>
        </div>
      </div>
    </div>
  </section>
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Karol Knurowski</a>
  </div>
</footer>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
  ></script>
</body>
</html>
