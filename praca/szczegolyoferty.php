<?php
session_start();
@include '../config.php';

if(isset($_GET['id'])){
    $id_ogloszenia = $_GET['id'];

    $check_query = "SELECT * FROM popularne_oferty WHERE id_oferty = $id_ogloszenia";
    $result = $conn->query($check_query);

    if ($result && $result->num_rows > 0) {
        $update_query = "UPDATE popularne_oferty SET ilosc_odslon = ilosc_odslon + 1 WHERE id_oferty = $id_ogloszenia";
        $conn->query($update_query);
    } else {
        $insert_query = "INSERT INTO popularne_oferty (id_oferty, ilosc_odslon) VALUES ($id_ogloszenia, 1)";
        $conn->query($insert_query);
    }
} else {
}

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
          <a href="" class="nav-link  active">
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
<a href="../firma/dodaj_ogloszenie.php" class="nav-link custom-link me-2">
  Dodaj ogłoszenie
  <img class="d-inline-block align-top" src="../images/icon_add.png" style="height: 20px;" />
</a>
</li>
html;
}
          if(isset($_SESSION['czyadmin']) && $_SESSION['czyfirma']=='TAK'){
            echo <<<html
        <li class="nav-item">
          <a href="../firma/firma-panel.php" class="nav-link custom-link me-2">
            Panel Firmy
            <img class="d-inline-block align-top" src="../images/company.png" style="height: 20px;" />
          </a>
        </li>
        html;
      }
      if(isset($_SESSION['czyadmin']) && $_SESSION['czyadmin']=='TAK'){
        echo <<<html
        <li class="nav-item">
        <a href="../adminpanel/admin-panel.php" class="nav-link custom-link me-2">
          Panel Admin
          <img class="d-inline-block align-top" src="../images/adminpanelzdj.png" style="height: 20px;" />
        </a>
      </li>
    html;
  }
  if (!isset($_SESSION['id'])) {
    echo <<<html
        <a href="../logowanie/login_form.php" class="nav-link custom-link me-2">
            Zaloguj się
        </a>
    html;
    echo <<<html
    <a href="../logowanie/register_form.php" class="zarejestruj-btn nav-link custom-link me-2">
        Zarejestruj się
    </a>
  html;
  }
  if(isset($_SESSION['id'])){

    echo <<<html
<li class="nav-item">
  <a href="../logowanie/logout.php" class="nav-link custom-link me-2">
    Wyloguj się
  </a>
</li>
html;
}
      
   

        ?>
      </ul>
    </div>
  </nav>
 



<body>
  <div class="container">
    <div class="row">
      <div class="col">
      <p class="text-black mt-5">Szukasz więcej ofert pracy?</p>
          <p class="text-black">dobrze się składa ponieważ w naszych ofertach napewno znajdziesz coś dla siebie!
          Wystarczy że wejdziesz w ten <a href="oferty_pracy.php" class="text-black">link</a>
          </p>
          
    </div>
      <div class="col">
        <?php
  $sql = "SELECT * from ogloszenie
  LEFT JOIN firma on ogloszenie.id_firmy=firma.id
  LEFT JOIN images on firma.konto_id=images.id
  WHERE ogloszenie.id=$_GET[id]";
  $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_object($result))
  {
    echo "<img src='data:image;base64,".base64_encode($row->image)."' height='300px'>";
}  
        ?>
        

    </div>  
    <div class="col">
    <?php

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT *  FROM ogloszenie JOIN firma ON ogloszenie.id_firmy = firma.id
LEFT JOIN konto ON firma.konto_id=konto.Id
LEFT JOIN images ON konto.Id=images.id";
$result = ($conn->query($sql))->fetch_array();

?>
      <h1><?php echo $result['nazwa']; ?></h1>
      <p class="text-black"><?php echo $result['poziom_stanowiska']; ?></p>
      <p class="text-black"><i class="fa-solid fa-list me-2"></i>Kategoria: <?php echo $result['kategoria']?></p>
      <p class="text-black"><i class="fa-solid fa-hand-holding-dollar me-2"></i>Wynagrodzenie: <?php echo $result['widelki_wynagrodzenia']?></p>
      <p class="text-black"><i class="fa-solid fa-ranking-star me-2"></i>Stanowisko: <?php echo $result['poziom_stanowiska']?></p>
      <p class="text-black"><i class="fa-regular fa-clock me-2"></i>Data ważnośći: <?php echo $result['data_waznosci']?></p>
      <p class="text-black"><i class="fa-solid fa-person-digging me-2"></i>Rodzaj pracy: <?php echo $result['rodzaj_pracy']?></p>
      
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  </head>
  <div class="announcement">
  <hr class="announcement-separator">
  <h3 class="announcement-title" id="announcement-1">Rodzaj umowy oraz wymiar etatu<span class="icon-toggle"><i class="fas fa-angle-down mt-1"></i></span></h3>
  <div class="announcement-description-full" data-target="announcement-1">
    <ul>
      <li><?php echo $result['rodzaj_umowy'] ?></li>
      <li><?php echo $result['wymiar_etatu'] ?></li>
    </ul>
  </div>
  <hr class="announcement-separator">
  <h3 class="announcement-title" id="announcement-2">Dni oraz godziny pracy:  <span class="icon-toggle"><i class="fas fa-angle-down mt-1"></i></span></h3>
  <div class="announcement-description-full" data-target="announcement-1">
    <ul>
      <li><?php echo $result['dni_pracy'] ?></li>
      <li><?php echo $result['godziny_pracy'] ?></li>
    </ul>
  </div>
  <hr class="announcement-separator">
  <h3 class="announcement-title" id="announcement-3">Obowiązki i wymagania:  <span class="icon-toggle"><i class="fas fa-angle-down mt-1"></i></span></h3>
  <div class="announcement-description-full" data-target="announcement-2">
    <ul>
      <li><?php echo $result['zakres_obowiazkow'] ?></li>
      <li><?php echo $result['wymagania_kandydata'] ?></li>
    </ul>
  </div>
  <hr class="announcement-separator">
  <h3 class="announcement-title" id="announcement-3">Oferowane benefity oraz informacje o firmie:  <span class="icon-toggle"><i class="fas fa-angle-down mt-1"></i></span></h3>
  <div class="announcement-description-full" data-target="announcement-2">
    <ul>
      <li><?php echo $result['oferowane_benefity'] ?></li>
      <li><?php echo $result['informacje_o_firmie'] ?></li>
    </ul>
  </div>
  <hr class="announcement-separator">
  <?php
$id_oferty = $_GET['id'];

if(isset($_SESSION['id'])){
    $sql = "SELECT * FROM aplikacja WHERE id_uzytkownika='".$_SESSION['id']."' AND id_ogloszenia='$id_oferty'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo <<<html
        <form method='GET' action='aplikowanie_uzytkownika.php'>
        <input type='hidden' value='$id_oferty' name='idogloszenia'>
        <input type='submit' class="aplicate-to-announcement" value="Aplikuj do tej oferty"></form>
        html;
    } else {
        ?><h1 class="text-danger">Aplikowałeś już do tej oferty!</h1><?php
    }
} else {
    echo <<<html
    <h1 class="text-danger">Aby móc aplikować do tej oferty zaloguj się lub zarejestruj!</h1>
    html;
}
?>

</div>
    </div>
</div>
  </div>
</body>












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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
  $('.announcement-title').click(function() {
    var targetId = $(this).attr('id'); 
    var icon = $(this).find('.icon-toggle i'); 
    $(this).nextAll('.announcement-description-full').first().toggle(); 
    icon.toggleClass('fa-angle-up fa-angle-down');
  });
});




  </script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
  ></script>
</body>
</html>
