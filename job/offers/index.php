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
          <a href="" class="nav-link  active">
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
<a href="../../company/addoffer/" class="nav-link custom-link me-2">
  Dodaj ogłoszenie
  <img class="d-inline-block align-top" src="../../images/icon_add.png" style="height: 20px;" />
</a>
</li>
html;
}
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
        <a href="../../admin/adminpanel/" class="nav-link custom-link me-2">
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



  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="kategoria" class="form-label">Kategoria:</label>
                    <select name="kategoria" class="form-select">
                        <option value="">Wybierz kategorię</option>
                        <?php
                        $sql = "SELECT * FROM kategoria";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option>".$row['kategoria']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="poziomstanowiskaa" class="form-label">Poziom Stanowiska:</label>
                    <select name="poziom_stanowiska" class="form-select">
                        <option value="">Wybierz Poziom Stanowiska</option>
                        <?php 
                        $sql = "SELECT * FROM poziom_stanowiska";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option>".$row['poziom_stanowiska']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="rodzajumowy" class="form-label">Rodzaj Umowy:</label>
                    <select name="rodzaj_umowy" class="form-select">
                        <option value="">Wybierz rodzaj umowy</option>
                        <?php 
                        $sql = "SELECT * FROM rodzaj_umowy";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option>".$row['rodzaj_umowy']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="wymiarEtatu" class="form-label">Wymiar Etatu:</label>
                    <select name="wymiar_etatu" class="form-select">
                        <option value="">Wymiar etatu</option>
                        <?php 
                        $sql = "SELECT * FROM wymiar_etatu";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option>".$row['wymiar_etatu']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="rodzajPracy" class="form-label">Rodzaj Pracy:</label>
                    <select name="rodzaj_pracy" class="form-select">
                        <option value="">Wybierz rodzaj pracy</option>
                        <?php 
                        $sql = "SELECT * FROM rodzaj_pracy";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option>".$row['rodzaj_pracy']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4" style="margin-top:45px;">
                    <button type="submit" class="btn btn-primary">Filtruj</button>
                    <a href="../offers/" class="btn btn-dangerx">Resetuj filtry</a>
                </div>
                
            </form>
        </div>
    </div>
</div>

<?php

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ogloszenie.id, ogloszenie.nazwa, ogloszenie.wymiar_etatu, ogloszenie.widelki_wynagrodzenia, images.image, firma.adres, firma.nazwa_firmy  
        FROM ogloszenie 
        JOIN firma ON ogloszenie.id_firmy = firma.id
        LEFT JOIN konto ON firma.konto_id=konto.Id
        LEFT JOIN images ON konto.Id=images.id";

$whereClause = "";
if(isset($_GET['kategoria']) && $_GET['kategoria'] != "") {
    $whereClause .= " AND kategoria = '".$_GET['kategoria']."'";
}

if(isset($_GET['poziom_stanowiska']) && $_GET['poziom_stanowiska'] != "") {
    $whereClause .= " AND poziom_stanowiska = '".$_GET['poziom_stanowiska']."'";
}

if(isset($_GET['rodzaj_umowy']) && $_GET['rodzaj_umowy'] != "") {
    $whereClause .= " AND rodzaj_umowy = '".$_GET['rodzaj_umowy']."'";
}

if(isset($_GET['wymiar_etatu']) && $_GET['wymiar_etatu'] != "") {
    $whereClause .= " AND wymiar_etatu = '".$_GET['wymiar_etatu']."'";
}

if(isset($_GET['rodzaj_pracy']) && $_GET['rodzaj_pracy'] != "") {
    $whereClause .= " AND rodzaj_pracy = '".$_GET['rodzaj_pracy']."'";
}
if(!empty($whereClause)) {
    $sql .= " WHERE 1 ".$whereClause;
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $counter = 0; 
?>
  
    <div class="container">
        <div class="row">
<?php
    while ($row = $result->fetch_assoc()) {
        if ($counter > 0 && $counter % 3 === 0) {
          
?>
            </div>
        </div>
        <div class="container">
            <div class="row">
<?php
        }
?>
              
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="../detailsoffers/?id=<?php echo $row["id"]?>">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nazwa']; ?></h5>
                            <p class="offerts-cost">
                                <span class="offerts-jobet">
                                    <?php echo $row['wymiar_etatu'];?>
                                </span>
                                <span class="offerts-salary">Zarobki:
                                    <?php echo $row['widelki_wynagrodzenia']; ?>
                                </span>
                            </p>
                            <div class="container">
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <?php
                                            echo "<img src='data:image;base64,".base64_encode($row["image"])."' height='300px'>";
                                        ?>
                                    </div>
                                    <div class="col-7 col-sm-8">
                                        <span id="name-offerts"><?php echo $row['nazwa_firmy']; ?></span>
                                        <p class="adress-offerts">
                                            <img src="../../images/lokalizacjaikona.png" style="height:15px">
                                            <?php echo $row['adres']; ?>
                                            <span class="offerts-iconsave">
                                                <img src="../../images/saveicon.png" style="height:20px; margin-left:180px; margin-top:-50px">
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
<?php
        $counter++;
    }
?>
        </div>
    </div>
<?php
} else {
    echo "Brak wyników";
}
$conn->close();
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
