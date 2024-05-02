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
  <link rel="stylesheet" href="../adminstyle/style.css" /> 
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
          <a href="../../job/offers/" class="nav-link">
            Oferty pracy
          </a>
        </li>
        <?php
              if(isset($_SESSION['id'])){
                echo <<<html
                <li class="nav-item custom-link1">
                  <a href="../../user/profile/" class="nav-link">
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
          <a href="../../company/companypanel/" class="nav-link custom-link me-2">
            Panel Firmy
            <img class="d-inline-block align-top" src="../../images/company.png" style="height: 20px;" />
          </a>
        </li>
        html;
      }
      if(isset($_SESSION['czyadmin']) && $_SESSION['czyadmin']=='TAK'){
        echo <<<html
        <li class="nav-item">
        <a href="../adminpanel/" class="nav-link custom-link me-2 active">
          Panel Admin
          <img class="d-inline-block align-top" src="../../images/adminpanelzdj.png" style="height: 20px;" />
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
					<h2>Witaj w panelu admina</h2>
					<p>Na tej stronie masz dostęp do wszystkich ważnych zarządzaniach stroną!</p>
                    <p>Uważaj na elementy zachowane na stronie ponieważ w łatwy sposób możesz usunąć ważne rzeczy</p>
				</div>
  </section>
                <div class="accordion-body">
                  <h1><center>Tabela do zarządzania Użytkownikami:</center></h1>
    <div class="tables-container">
      <div class="table-wrapper">
      <?php
        
        try {
          
          
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $query = "SELECT * FROM konto";
            
            $result = $conn->query($query);
            echo "<table>";
            echo "<tr><th>ID</th><th>Nazwa Użytkownika</th><th>Akcja</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['Id']}</td>
                <form method='GET' action='../editdelete'>
                <td><input type='text' name='nazwa' value='{$row['email']}' style='width:720px'>
                </input><input type='hidden' name='id' value = '{$row['Id']}'>
                <input type='hidden' name='tabela' value = 'konto']}'></td><td>
                <input type='submit' name='delete' value='Usun'>
                </form></td></tr>";
            }
            echo "</table>";
        } catch (Exception $e) { 
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
        }
        ?>
      </div>
    </div>
     <!-- Tabela Wymiar Etatu  -->
     <h1><center>Tabela Wymiar Etatu:</center></h1>
    <div class="tables-container">
      <div class="table-wrapper">
        <?php
        
        try {
          

            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $query = "SELECT * FROM wymiar_etatu";
            
            $result = $conn->query($query);
            echo "<table>";
            echo "<tr><th>ID</th><th>Wymiar Etatu</th><th>Akcja</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['id']}</td>
                <form method='GET' action='../editdelete'>
                <td><input type='text' name='nazwa' value='{$row['wymiar_etatu']}' style='width:720px'>
                </input><input type='hidden' name='id' value = '{$row['id']}'>
                <input type='hidden' name='tabela' value = 'wymiar_etatu']}'></td><td>
                <input type='submit' name='edit' value='Edytuj'>
                <input type='submit' name='delete' value='Usun'>
                </form></td></tr>";
            }
            echo "</table>";
        } catch (Exception $e) { 
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
        }
        ?>

        <form method="GET" action="../add">
          <input type="hidden" value="wymiar_etatu" name="kategoria">
            Dodaj nową kategorię: <input type="text" name="valuekategoria" required>
            <input type="submit" value="Dodaj">
        </form>
      </div>
    </div>

    <h1><center>Tabela kategorie:</center></h1>
    <div class="tables-container">
      <div class="table-wrapper">
      <?php
        
        try {
          

            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $query = "SELECT * FROM kategoria";
            
            $result = $conn->query($query);
            echo "<table>";
            echo "<tr><th>ID</th><th>Kategoria</th><th>Akcja</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['id']}</td>
                <form method='GET' action='../editdelete'>
                <td><input type='text' name='nazwa' value='{$row['kategoria']}' style='width:720px'>
                </input><input type='hidden' name='id' value = '{$row['id']}'>
                <input type='hidden' name='tabela' value = 'kategoria']}'></td><td>
                <input type='submit' name='edit' value='Edytuj'>
                <input type='submit' name='delete' value='Usun'>
                </form></td></tr>";
            }
            echo "</table>";
        } catch (Exception $e) { 
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
        }
        ?>

        <form method="GET" action="../add">
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
        
        try {
          

            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $query = "SELECT * FROM poziom_stanowiska";
            
            $result = $conn->query($query);
            echo "<table>";
            echo "<tr><th>ID</th><th>Poziom Stanowiska</th><th>Akcja</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['id']}</td>
                <form method='GET' action='../editdelete'>
                <td><input type='text' name='nazwa' value='{$row['poziom_stanowiska']}' style='width:720px'>
                </input><input type='hidden' name='id' value = '{$row['id']}'>
                <input type='hidden' name='tabela' value = 'poziom_stanowiska']}'></td><td>
                <input type='submit' name='edit' value='Edytuj'>
                <input type='submit' name='delete' value='Usun'>
                </form></td></tr>";
            }
            echo "</table>";
        } catch (Exception $e) { 
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
        }
        ?>

        <form method="GET" action="../add">
          <input type="hidden" value="poziom_stanowiska" name="kategoria">
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
        
        try {
          

            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $query = "SELECT * FROM rodzaj_umowy";
            
            $result = $conn->query($query);
            echo "<table>";
            echo "<tr><th>ID</th><th>Rodzaj Umowy</th><th>Akcja</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['id']}</td>
                <form method='GET' action='../editdelete'>
                <td><input type='text' name='nazwa' value='{$row['rodzaj_umowy']}' style='width:720px'>
                </input><input type='hidden' name='id' value = '{$row['id']}'>
                <input type='hidden' name='tabela' value = 'rodzaj_umowy']}'></td><td>
                <input type='submit' name='edit' value='Edytuj'>
                <input type='submit' name='delete' value='Usun'>
                </form></td></tr>";
            }
            echo "</table>";
        } catch (Exception $e) { 
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
        }
        ?>

        <form method="GET" action="../add">
          <input type="hidden" value="rodzaj_umowy" name="kategoria">
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
        
        try {
          

            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $query = "SELECT * FROM rodzaj_pracy";
            
            $result = $conn->query($query);
            echo "<table>";
            echo "<tr><th>ID</th><th>Rodzaj Pracy</th><th>Akcja</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['id']}</td>
                <form method='GET' action='../editdelete'>
                <td><input type='text' name='nazwa' value='{$row['rodzaj_pracy']}' style='width:720px'>
                </input><input type='hidden' name='id' value = '{$row['id']}'>
                <input type='hidden' name='tabela' value = 'rodzaj_pracy']}'></td><td>
                <input type='submit' name='edit' value='Edytuj'>
                <input type='submit' name='delete' value='Usun'>
                </form></td></tr>";
            }
            echo "</table>";
        } catch (Exception $e) { 
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
        }
        ?>

        <form method="GET" action="../add">
          <input type="hidden" value="rodzaj_pracy" name="kategoria">
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
        
        try {
          

            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $query = "SELECT * FROM dni_pracy";
            
            $result = $conn->query($query);
            echo "<table>";
            echo "<tr><th>ID</th><th>Dni pracy</th><th>Akcja</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['id']}</td>
                <form method='GET' action='../editdelete'>
                <td><input type='text' name='nazwa' value='{$row['dni_pracy']}' style='width:720px'>
                </input><input type='hidden' name='id' value = '{$row['id']}'>
                <input type='hidden' name='tabela' value = 'dni_pracy']}'></td><td>
                <input type='submit' name='edit' value='Edytuj'>
                <input type='submit' name='delete' value='Usun'>
                </form></td></tr>";
            }
            echo "</table>";
        } catch (Exception $e) { 
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
        }
        ?>

        <form method="GET" action="../add">
          <input type="hidden" value="dni_pracy" name="kategoria">
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
        
        try {
          

            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $query = "SELECT * FROM godziny_pracy";
            
            $result = $conn->query($query);
            echo "<table>";
            echo "<tr><th>ID</th><th>Godziny pracy</th><th>Akcja</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['id']}</td>
                <form method='GET' action='../editdelete'>
                <td><input type='text' name='nazwa' value='{$row['godziny_pracy']}' style='width:720px'>
                </input><input type='hidden' name='id' value = '{$row['id']}'>
                <input type='hidden' name='tabela' value = 'godziny_pracy']}'></td><td>
                <input type='submit' name='edit' value='Edytuj'>
                <input type='submit' name='delete' value='Usun'>
                </form></td></tr>";
            }
            echo "</table>";
        } catch (Exception $e) { 
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
        }
        ?>

        <form method="GET" action="../add">
          <input type="hidden" value="godziny_pracy" name="kategoria">
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
