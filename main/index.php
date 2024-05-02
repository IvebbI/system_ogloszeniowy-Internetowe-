<?php
  session_start();
  @include '../connection/index.php';
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <a href="" class="navbar-brand mx-3">
      <img class="d-inline-block align-top" src="../images/logo.jpg" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item custom-link1">
          <a href="" class="nav-link active">
            Główna
          </a>
        </li>
        <li class="nav-item custom-link1">
          <a href="../job/offers/" class="nav-link">
            Oferty pracy
          </a>
        </li>
        <?php
        
            if(isset($_SESSION['id'])){
            
            ?>
            
            <li class="nav-item custom-link1">
              <a href="../user/profile/
              <?php
                if($_SESSION['czyfirma']){
                  $query = "SELECT * FROM firma where konto_id = " . $_SESSION['id'];
                  $return = $conn->query($query);
                  $row = $return -> fetch_assoc();
                  $_SESSION['firmaID'] = $row['id'];
                }
              ?>
              " class="nav-link">
                Mój profil
              </a>
            </li>
       
            <?php
          }
        ?>  
      </ul>
      <ul class="navbar-nav ms-auto">

      <?php

      
if(isset($_SESSION['czyadmin']) && $_SESSION['czyfirma']=='TAK'){
  echo <<<html
<li class="nav-item">
<a href="../company/addoffer/" class="nav-link custom-link me-2">
  Dodaj ogłoszenie
  <img class="d-inline-block align-top" src="../images/icon_add.png" style="height: 20px;" />
</a>
</li>
html;
}
          if(isset($_SESSION['czyadmin'])  && $_SESSION['czyfirma']=='TAK'){

            echo <<<html
        <li class="nav-item">
          <a href="../company/companypanel/" class="nav-link custom-link me-2">
            Panel Firmy
            <img class="d-inline-block align-top" src="../images/company.png" style="height: 20px;" />
          </a>
        </li>
        html;
      }
      
      if(isset($_SESSION['czyadmin']) && $_SESSION['czyadmin']=='TAK'){
        echo <<<html
        <li class="nav-item">
        <a href="../admin/adminpanel/" class="nav-link custom-link me-2">
          Panel Admin
          <img class="d-inline-block align-top" src="../images/adminpanelzdj.png" style="height: 20px;" />
        </a>
      </li>
    html;
  }
          if(isset($_SESSION['czyadmin']) || isset($_SESSION['id'])){

              echo <<<html
          <li class="nav-item">
            <a href="../login/logout/" class="nav-link custom-link me-2">
              Wyloguj się
            </a>
          </li>
          html;
        }

          
      
?>
   
  <li class="nav-item">
  <?php
if (!isset($_SESSION['id'])) {
  echo <<<html
      <a href="../login/loginform/" class="login-btn me-2">
          Zaloguj się
      </a>
  html;
  echo <<<html
  <a href="../login/registerform/" class="zarejestruj-btn register-btn me-2">
      Zarejestruj się
  </a>
html;
}



          
          ?>
</li>



    
      </ul>
      
    </div>
  </nav>
  <section id="home" class="welcome-hero">
			<div class="container">
				<div class="welcome-hero-txt">
					<h2>Najlepsze miejsce do wyszukania <br> wszystkiego co potrzebujesz </h2>
					<p>
						Znajdź najlepszą pracę na naszej stronie klikając oraz przeglądając odpowiednie karty
					</p>
				</div>
				
					<div class="welcome-hero-serch">
						<button class="welcome-hero-btn">
							 Przejrzyj oferty  <i data-feather="search"></i> 
						</button>
					</div>
				</div>
			</div>

		</section>
   


    <section id="works" class="works" style="margin-top:100px">
			<div class="container">
				<div class="section-header">
					<h2>Jak to działa?</h2>
					<p>Dowiedz się wiecej na temat naszych ofert pracy</p>
				</div>
				<div class="works-content">
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">

								<img src="../images/loupe_751463.png" style="height: 100px">

								<h2><a href="#">Wybierz<span> prace jaką</span> chcesz</a></h2>
								<p>
									Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt ut laboremagna aliqua. 
								</p>
								<button class="welcome-hero-btn how-work-btn" onclick="window.location.href='#'">
									czytaj więcej
								</button>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">
              <img src="../images/man_816730.png" style="height: 100px">
								<h2><a href="#">znajdź <span> pracę jaką potrzebujesz</span></a></h2>
								<p>
									Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt ut laboremagna aliqua. 
								</p>
								<button class="welcome-hero-btn how-work-btn">
								czytaj więcej
								</button>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">
              <img src="../images/select_6448937.png" style="height: 100px">
								<h2><a href="#">szukaj <span> ekstra</span> ofert pracy</a></h2>
								<p>
									Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt ut laboremagna aliqua. 
								</p>
								<button class="welcome-hero-btn how-work-btn" onclick="window.location.href='#'">
								czytaj więcej
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		</section>



				

<div class="container">
<div class="section-header">
					<h2>Szukasz ofert pracy?</h2>
					<p>Zobacz najpopularniejsze oferty pracy w tym miesiącu</p>
				</div>

        <?php
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT ogloszenie.id, ogloszenie.nazwa, ogloszenie.wymiar_etatu, ogloszenie.widelki_wynagrodzenia, images.image, firma.adres, firma.nazwa_firmy  
            FROM popularne_oferty 
            JOIN ogloszenie ON popularne_oferty.id_oferty = ogloszenie.id
            JOIN firma ON ogloszenie.id_firmy = firma.id
            LEFT JOIN konto ON firma.konto_id=konto.Id
            LEFT JOIN images ON konto.Id=images.id";

    $stmt = $dbh->query($sql);

    if ($stmt->rowCount() > 0) {
        $counter = 0; 
?>
  
        <div class="container">
            <div class="row">
<?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
                    <a href="../job/detailsoffers/?id=<?php echo $row["id"]?>">
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
                                                <img src="../images/lokalizacjaikona.png" style="height:15px">
                                                <?php echo $row['adres']; ?>
                                                <span class="offerts-iconsave">
                                                    <img src="../images/saveicon.png" style="height:20px; margin-left:180px; margin-top:-50px">
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
    $dbh = null;
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>






</section>







  
  <!-- footer -->
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
