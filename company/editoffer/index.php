<?php
session_start();
@include '../../connection/index.php';
$sql = "UPDATE `ogloszenie` SET `nazwa`='".$_GET['nazwaogloszenia']."',
`poziom_stanowiska`='".$_GET['poziomstanowiska']."',`rodzaj_umowy`='".$_GET['rodzajumowyy']."',`wymiar_etatu`='".$_GET['wymiaretatuu']."',`rodzaj_pracy`='".$_GET['rodzajpracyy']."',
`widelki_wynagrodzenia`='".$_GET['wynagrodzenie']."',`dni_pracy`='".$_GET['dnipracyod']."-".$_GET['dnipracydo']."',`godziny_pracy`='".$_GET['godzinypracyod']."-".$_GET['godzinypracydo']."',`data_waznosci`='".$_GET['datawaznosci']."',
`kategoria`='".$_GET['kategoriao']."',`zakres_obowiazkow`='".$_GET['zakresobowiazkow']."',`wymagania_kandydata`='".$_GET['wymaganiakandydata']."',`oferowane_benefity`='".$_GET['oferowanebenfity']."',
`informacje_o_firmie`='".$_GET['informacjeFirmy']."' WHERE id = ".$_GET['id'];
$return = $conn->query($sql);
header('location:../companypanel/');    
?>