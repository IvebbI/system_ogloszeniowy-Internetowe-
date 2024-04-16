<?php
session_start();
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
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="../style.css" /> 
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light bg-light mb-5">
    <a href="../glowna.php" class="navbar-brand mx-3">
      <img class="d-inline-block align-top" src="../images/logo.jpg" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item custom-link1">
          <a href="../glowna.php" class="nav-link">
            Główna
          </a>
        </li>
        <li class="nav-item custom-link1">
          <a href="../praca/oferty_pracy.php" class="nav-link">
            Oferty pracy
          </a>
        </li>
        <?php
              if(isset($_SESSION['id'])){
                echo <<<html
                <li class="nav-item custom-link1">
                  <a href="../uzytkownik/profil.php" class="nav-link">
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
          <a href="../firma/firma_panel.php" class="nav-link custom-link me-2">
            Panel Firmy
            <img class="d-inline-block align-top" src="../images/company.png" style="height: 20px;" />
          </a>
        </li>
        html;
      }
      if(isset($_SESSION['czyadmin']) && $_SESSION['czyadmin']=='TAK'){
        echo <<<html
        <li class="nav-item">
        <a href="../adminpanel/admin-panel.php" class="nav-link custom-link me-2 active">
          Panel Admin
          <img class="d-inline-block align-top" src="../images/adminpanelzdj.png" style="height: 20px;" />
        </a>
      </li>
    html;
  }
  if (!isset($_SESSION['id'])) {
    echo <<<html
        <a href="/system_ogloszeniowy-Internetowe-/logowanie/login_form.php" class="nav-link custom-link me-2">
            Zaloguj się
        </a>
    html;
    echo <<<html
    <a href="/system_ogloszeniowy-Internetowe-/logowanie/register_form.php" class="zarejestruj-btn nav-link custom-link me-2">
        Zarejestruj się
    </a>
  html;
  }
  if(isset($_SESSION['id'])){

    echo <<<html
<li class="nav-item">
  <a href="/system_ogloszeniowy-Internetowe-/logowanie/logout.php" class="nav-link custom-link me-2">
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
					<h2>Witaj w panelu admina</h2>
					<p>Na tej stronie masz dostęp do wszystkich ważnych zarządzaniach stroną!</p>
                    <p>Uważaj na elementy zachowane na stronie ponieważ w łatwy sposób możesz usunąć ważne rzeczy</p>
				</div>
  </section>
                <div class="accordion-body">
    <h1><center>Tabela kategorie:</center></h1>
    <div class="tables-container">
      <div class="table-wrapper">
        <?php
        $dsn = 'mysql:host=localhost;dbname=baza_systemogloszeniowy';
        $username = 'root';
        $password = '';
        
        try {
            $pdo = new PDO($dsn, $username, $password);
          
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query = "SELECT * FROM kategoria";
            
            $stmt = $pdo->query($query);
            echo "<table>";
            echo "<tr><th>ID</th><th>Kategoria</th><th>Akcja</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>{$row['id']}</td>
                <form method='GET' action='edytuj_usun.php'>
                <td><input type='text' name='nazwa' value='{$row['kategoria']}' style='width:720px'>
                </input><input type='hidden' name='id' value = '{$row['id']}'>
                <input type='hidden' name='tabela' value = 'kategoria']}'></td><td>
                <input type='submit' name='edit' value='Edytuj'>
                <input type='submit' name='delete' value='Usun'>
                </form></td></tr>";
            }
            echo "</table>";
            
            $pdo = null;
        } catch (PDOException $e) { 
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
        }
        ?>

        <form method="GET" action="dodaj_dana.php">
          <input type="hidden" value="kategoria" name="kategoria">
            Dodaj nową kategorię: <input type="text" name="valuekategoria" required>
            <input type="submit" value="Dodaj">
        </form>
      </div>
    </div>
   <!-- Tabela Poziom Stanowiska  -->
      <h1><center>Tabela Poziom Stanowiska:</center></h1>
    <div class="tables-container">
      <div class="table-wrapper">
        <?php
        $dsn = 'mysql:host=localhost;dbname=baza_systemogloszeniowy';
        $username = 'root';
        $password = '';
        
        try {
            $pdo = new PDO($dsn, $username, $password);
          
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query = "SELECT * FROM poziom_stanowiska";
            
            $stmt = $pdo->query($query);
            echo "<table>";
            echo "<tr><th>ID</th><th>Poziom Stanowiska</th><th>Akcja</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>{$row['id']}</td>
                <form method='GET' action='edytuj_usun.php'>
                <td><input type='text' name='nazwa' value='{$row['poziom_stanowiska']}' style='width:720px'>
                </input><input type='hidden' name='id' value = '{$row['id']}'>
                <input type='hidden' name='tabela' value = 'poziom_stanowiska']}'></td><td>
                <input type='submit' name='edit' value='Edytuj'>
                <input type='submit' name='delete' value='Usun'>
                </form></td></tr>";
            }
            echo "</table>";
            
            $pdo = null;
        } catch (PDOException $e) { 
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
        }
        ?>

        <form method="GET" action="dodaj_dana.php">
          <input type="hidden" value="kategoria" name="kategoria">
            Dodaj nową kategorię: <input type="text" name="valuekategoria" required>
            <input type="submit" value="Dodaj">
        </form>
      </div>
    </div>
     <!-- Tabela Rodzaj Umowy  -->
     <h1><center>Tabela Rodzaj Umowy:</center></h1>
    <div class="tables-container">
      <div class="table-wrapper">
        <?php
        $dsn = 'mysql:host=localhost;dbname=baza_systemogloszeniowy';
        $username = 'root';
        $password = '';
        
        try {
            $pdo = new PDO($dsn, $username, $password);
          
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query = "SELECT * FROM rodzaj_umowy";
            
            $stmt = $pdo->query($query);
            echo "<table>";
            echo "<tr><th>ID</th><th>Rodzaj Umowy</th><th>Akcja</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>{$row['id']}</td>
                <form method='GET' action='edytuj_usun.php'>
                <td><input type='text' name='nazwa' value='{$row['rodzaj_umowy']}' style='width:720px'>
                </input><input type='hidden' name='id' value = '{$row['id']}'>
                <input type='hidden' name='tabela' value = 'rodzaj_umowy']}'></td><td>
                <input type='submit' name='edit' value='Edytuj'>
                <input type='submit' name='delete' value='Usun'>
                </form></td></tr>";
            }
            echo "</table>";
            
            $pdo = null;
        } catch (PDOException $e) { 
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
        }
        ?>

        <form method="GET" action="dodaj_dana.php">
          <input type="hidden" value="kategoria" name="kategoria">
            Dodaj nową kategorię: <input type="text" name="valuekategoria" required>
            <input type="submit" value="Dodaj">
        </form>
      </div>
    </div>
     <!-- Tabela Wymiar Etatu  -->
     <h1><center>Tabela Wymiar Etatu:</center></h1>
    <div class="tables-container">
      <div class="table-wrapper">
        <?php
        $dsn = 'mysql:host=localhost;dbname=baza_systemogloszeniowy';
        $username = 'root';
        $password = '';
        
        try {
            $pdo = new PDO($dsn, $username, $password);
          
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query = "SELECT * FROM wymiar_etatu";
            
            $stmt = $pdo->query($query);
            echo "<table>";
            echo "<tr><th>ID</th><th>Wymiar Etatu</th><th>Akcja</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>{$row['id']}</td>
                <form method='GET' action='edytuj_usun.php'>
                <td><input type='text' name='nazwa' value='{$row['wymiar_etatu']}' style='width:720px'>
                </input><input type='hidden' name='id' value = '{$row['id']}'>
                <input type='hidden' name='tabela' value = 'wymiar_etatu']}'></td><td>
                <input type='submit' name='edit' value='Edytuj'>
                <input type='submit' name='delete' value='Usun'>
                </form></td></tr>";
            }
            echo "</table>";
            
            $pdo = null;
        } catch (PDOException $e) { 
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
        }
        ?>

        <form method="GET" action="dodaj_dana.php">
          <input type="hidden" value="kategoria" name="kategoria">
            Dodaj nową kategorię: <input type="text" name="valuekategoria" required>
            <input type="submit" value="Dodaj">
        </form>
      </div>
    </div>
     <!-- Tabela Rodzaj Pracy  -->
     <h1><center>Tabela Rodzaj Pracy:</center></h1>
    <div class="tables-container">
      <div class="table-wrapper">
        <?php
        $dsn = 'mysql:host=localhost;dbname=baza_systemogloszeniowy';
        $username = 'root';
        $password = '';
        
        try {
            $pdo = new PDO($dsn, $username, $password);
          
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query = "SELECT * FROM rodzaj_pracy";
            
            $stmt = $pdo->query($query);
            echo "<table>";
            echo "<tr><th>ID</th><th>Rodzaj Pracy</th><th>Akcja</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>{$row['id']}</td>
                <form method='GET' action='edytuj_usun.php'>
                <td><input type='text' name='nazwa' value='{$row['rodzaj_pracy']}' style='width:720px'>
                </input><input type='hidden' name='id' value = '{$row['id']}'>
                <input type='hidden' name='tabela' value = 'rodzaj_pracy']}'></td><td>
                <input type='submit' name='edit' value='Edytuj'>
                <input type='submit' name='delete' value='Usun'>
                </form></td></tr>";
            }
            echo "</table>";
            
            $pdo = null;
        } catch (PDOException $e) { 
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
        }
        ?>

        <form method="GET" action="dodaj_dana.php">
          <input type="hidden" value="kategoria" name="kategoria">
            Dodaj nową kategorię: <input type="text" name="valuekategoria" required>
            <input type="submit" value="Dodaj">
        </form>
      </div>
    </div>
    <!-- Tabela Dni Pracy  -->
    <h1><center>Tabela Dni Pracy:</center></h1>
    <div class="tables-container">
      <div class="table-wrapper">
        <?php
        $dsn = 'mysql:host=localhost;dbname=baza_systemogloszeniowy';
        $username = 'root';
        $password = '';
        
        try {
            $pdo = new PDO($dsn, $username, $password);
          
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query = "SELECT * FROM dni_pracy";
            
            $stmt = $pdo->query($query);
            echo "<table>";
            echo "<tr><th>ID</th><th>Dni Pracy</th><th>Akcja</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>{$row['id']}</td>
                <form method='GET' action='edytuj_usun.php'>
                <td><input type='text' name='nazwa' value='{$row['dni_pracy']}' style='width:720px'>
                </input><input type='hidden' name='id' value = '{$row['id']}'>
                <input type='hidden' name='tabela' value = 'dni_pracy']}'></td><td>
                <input type='submit' name='edit' value='Edytuj'>
                <input type='submit' name='delete' value='Usun'>
                </form></td></tr>";
            }
            echo "</table>";
            
            $pdo = null;
        } catch (PDOException $e) { 
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
        }
        ?>

        <form method="GET" action="dodaj_dana.php">
          <input type="hidden" value="kategoria" name="kategoria">
            Dodaj nową kategorię: <input type="text" name="valuekategoria" required>
            <input type="submit" value="Dodaj">
        </form>
      </div>
    </div>
    <!-- Tabela Godziny Pracy  -->
    <h1><center>Tabela Godziny Pracy:</center></h1>
    <div class="tables-container">
      <div class="table-wrapper">
        <?php
        $dsn = 'mysql:host=localhost;dbname=baza_systemogloszeniowy';
        $username = 'root';
        $password = '';
        
        try {
            $pdo = new PDO($dsn, $username, $password);
          
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query = "SELECT * FROM godziny_pracy";
            
            $stmt = $pdo->query($query);
            echo "<table>";
            echo "<tr><th>ID</th><th>Godziny Pracy</th><th>Akcja</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>{$row['id']}</td>
                <form method='GET' action='edytuj_usun.php'>
                <td><input type='text' name='nazwa' value='{$row['godziny_pracy']}' style='width:720px'>
                </input><input type='hidden' name='id' value = '{$row['id']}'>
                <input type='hidden' name='tabela' value = 'godziny_pracy']}'></td><td>
                <input type='submit' name='edit' value='Edytuj'>
                <input type='submit' name='delete' value='Usun'>
                </form></td></tr>";
            }
            echo "</table>";
            
            $pdo = null;
        } catch (PDOException $e) { 
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
        }
        ?>

        <form method="GET" action="dodaj_dana.php">
          <input type="hidden" value="kategoria" name="kategoria">
            Dodaj nową kategorię: <input type="text" name="valuekategoria" required>
            <input type="submit" value="Dodaj">
        </form>
      </div>
    </div>
  </div>  

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
