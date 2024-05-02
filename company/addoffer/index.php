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
      <a href="" class="nav-link custom-link me-2  active">
        Dodaj ogłoszenie
        <img class="d-inline-block align-top" src="../../images/icon_add.png" style="height: 20px;" />
      </a>
    </li>
    html;
  }
          if(isset($_SESSION['czyadmin']) && $_SESSION['czyfirma']=='TAK'){
            echo <<<html
        <li class="nav-item">
          <a href="../companypanel/" class="nav-link custom-link me-2">
            Panel Firmy
            <img class="d-inline-block align-top" src="../../images/company.png" style="height: 20px;" />
          </a>
        </li>
        html;
      }
      if(isset($_SESSION['czyadmin']) && $_SESSION['czyadmin']=='TAK'){
        echo <<<html
        <li class="nav-item">
        <a href="../admin/adminpanel/" class="nav-link custom-link me-2 ">
          Panel Admin
          <img class="d-inline-block align-top" src="../images/adminpanelzdj.png" style="height: 30px;" />
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
					<h2>Witaj w Dodawaniu Ogłoszenia!</h2>
					<p>Na tej stronie poprzez wypełnienie formularza możesz dodać ogłoszenie!</p>
                    <p>Pamiętaj! Jeśli nie masz uzupełnionego profiulu firmowego akcja dodawania zostanie zablokowana! </p>

		
		
      </section>
  <div  class="container">
  <div class="container mt-5">
        <form method="GET" action="../addoffercontinue">
            <div class="mb-3">
                <label for="nazwaStanowiska" class="form-label">Nazwa Stanowiska</label>
                <input type="text" name="nazwastanowiska"  required class="form-control" id="nazwaStanowiska" aria-describedby="nazwaStanowiskaHelp">
            </div>
            <div class="mb-3">
                <label for="kategoria" class="form-label">Kategoria:</label>
                <select name="kategoriao" class="form-select" require>
                    <?php
                        $sql = "SELECT * FROM kategoria";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            echo "<option>".$row['kategoria']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="poziomstanowiskaa" class="form-label">Poziom Stanowiska:</label>
                <select name="poziom_stanowiska" class="form-select" >
                    <?php 
                        $sql = "SELECT * FROM poziom_stanowiska";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            echo "<option>".$row['poziom_stanowiska']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="rodzajumowy" class="form-label">Rodzaj Umowy:</label>
                <select name="rodzaj_umowy" class="form-select">
                    <?php 
                        $sql = "SELECT * FROM rodzaj_umowy";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            echo "<option>".$row['rodzaj_umowy']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="wymiarEtatu" class="form-label">Wymiar Etatu:</label>
                <select name="wymiar_etatu" class="form-select">
                    <?php 
                        $sql = "SELECT * FROM wymiar_etatu";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            echo "<option>".$row['wymiar_etatu']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="rodzajPracy" class="form-label">Rodzaj Pracy:</label>
                <select name="rodzaj_pracy" class="form-select">
                    <?php 
                        $sql = "SELECT * FROM rodzaj_pracy";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            echo "<option>".$row['rodzaj_pracy']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="wynagrodzenie" class="form-label">Wynagrodzenie:</label>
                <input type="text"  required name="wynagrodzenie" class="form-control" id="wynagrodzenie">
            </div>
            <div class="mb-3">
                <label for="dniPracy" class="form-label">Dni pracy:</label>
                <label>od:</label>
                <select name="dni_pracy_od" class="form-select">
                    <?php
                        $sql = "SELECT * FROM dni_pracy";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            echo "<option>".$row['dni_pracy']."</option>";
                        }
                    ?>
                </select>
                <label for="dni_pracy_do" class="form-label">do:</label>
                <select name="dni_pracy_do" class="form-select">
                    <?php
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            echo "<option>".$row['dni_pracy']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="godzinyPracy" class="form-label">Godziny pracy:</label>
                <label>od:</label>
                <select name="godziny_od" class="form-select">
                    <?php
                        $sql = "SELECT * FROM godziny_pracy";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            echo "<option>".$row['godziny_pracy']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="godzinyPracy" class="form-label">do:</label>
                <select name="godziny_do" class="form-select">
                    <?php
                        $sql = "SELECT * FROM godziny_pracy";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            echo "<option>".$row['godziny_pracy']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class = "mb-3">
            <label for="nazwaStanowiska" class="form-label">Data ważności:</label>
                <input type="Date" name="datawaznosci" class="form-control" id="nazwaStanowiska" aria-describedby="nazwaStanowiskaHelp" required>
                      </div>
                        <div class="mb-3">
                        <label for="rodzajPracy" class="form-label">Zakres obowiązków:</label>
                <textarea class="form-control" required id="exampleFormControlTextarea1" name="zakresobowiazkow" rows="3"></textarea>
                      </div>

                <div class="mb-3">

                <label for="" class="form-label">Wymagania kandydata:</label>
                <textarea class="form-control" required id="exampleFormControlTextarea1" name="wymaganiakandydata" rows="3"></textarea>
                      </div>
                      <div class="mb-3">

                      <label for="" class="form-label">Oferowane benefity:</label>
                <textarea class="form-control" required id="exampleFormControlTextarea1" name="oferowanebenfity" rows="3"></textarea>
                      </div>
                      <div class="mb-3">

                      <label for="" class="form-label">Informacje firmy:</label>
                <textarea class="form-control" required id="exampleFormControlTextarea1" name="informacjeFirmy" rows="3"></textarea>
                      </div>
              <br>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div></div><br><br>







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
