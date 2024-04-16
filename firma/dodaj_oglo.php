<?php
session_start();
    $conn = mysqli_connect('localhost','root','','baza_systemogloszeniowy');
    $sql = "INSERT INTO `ogloszenie`(`id_firmy`, `nazwa`, `poziom_stanowiska`, `rodzaj_umowy`, `wymiar_etatu`, `rodzaj_pracy`, `widelki_wynagrodzenia`, `dni_pracy`, `godziny_pracy`, `data_waznosci`, `kategoria`, `zakres_obowiazkow`, `wymagania_kandydata`, `oferowane_benefity`, `informacje_o_firmie`) 
    VALUES ('".$_SESSION['firma_id']."','".$_GET['nazwastanowiska']."','".$_GET['poziom_stanowiska']."','".$_GET['rodzaj_umowy']."','".$_GET['wymiar_etatu']."','".$_GET['rodzaj_pracy']."','". $_GET['wynagrodzenie']."','".$_GET['dni_pracy_od']."-".$_GET['dni_pracy_do']."','".$_GET['godziny_od']."-".$_GET['godziny_do']."','".$_GET['datawaznosci']."','".$_GET['kategoriao']."','".$_GET['zakresobowiazkow']."','".$_GET['wymaganiakandydata']."','".$_GET['oferowanebenfity']."','".$_GET['informacjeFirmy']."')";


   $return = $conn->query($sql);
    
    header('location:../firma/firma-panel.php');
?>