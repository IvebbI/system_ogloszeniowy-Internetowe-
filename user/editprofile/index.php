<?php
session_start();
@include '../../connection/index.php';
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];

    $query = "SELECT * FROM konto
              LEFT JOIN doswiadczenie ON konto.id = doswiadczenie.id
              LEFT JOIN wyksztalcenie ON konto.id = wyksztalcenie.id
              LEFT JOIN link ON konto.id = link.id
              LEFT JOIN jezyk ON konto.id = jezyk.id
              LEFT JOIN kurs ON konto.id = kurs.id
              LEFT JOIN umiejetnosc ON konto.id = umiejetnosc.id
              LEFT JOIN uzytkownik ON konto.id = uzytkownik.id
              WHERE konto.id = $userId";


    if (!$result = $conn->query($query)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        exit();
    }



    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();


    } else {
        echo "Brak danych lub błąd zapytania.";
    }
} else {
    echo "Brak sesji użytkownika.";
}
if (isset($_POST['email'])) {
    $email = $conn->real_escape_string($_POST['email']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM konto WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `konto` SET `email`='$email' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `konto` (id, email) VALUES ($userId, '$email')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['linkgithub'])) {
    $adres_url = $conn->real_escape_string($_POST['linkgithub']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM link WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `link` SET `adres_url`='$adres_url' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `link` (id,id_uzytkownika, adres_url) VALUES ($userId,$userId, '$adres_url')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['imie'])) {
    $imie = $conn->real_escape_string($_POST['imie']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM uzytkownik WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `uzytkownik` SET `imie`='$imie' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `uzytkownik` (id, imie) VALUES ($userId, '$imie')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['nazwisko'])) {
    $dana = $conn->real_escape_string($_POST['nazwisko']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM uzytkownik WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `uzytkownik` SET `nazwisko`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `uzytkownik` (id, nazwisko) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['dataurodzenia'])) {
    $dana = $conn->real_escape_string($_POST['dataurodzenia']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM uzytkownik WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `uzytkownik` SET `data_urodzenia`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `uzytkownik` (id, data_urodzenia) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['numertelefonu'])) {
    $dana = $conn->real_escape_string($_POST['numertelefonu']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM uzytkownik WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `uzytkownik` SET `numer_telefonu`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `uzytkownik` (id, numer_telefonu) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['miejscezamieszkania'])) {
    $dana = $conn->real_escape_string($_POST['miejscezamieszkania']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM uzytkownik WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `uzytkownik` SET `miejsce_zamieszkania`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `uzytkownik` (id, miejsce_zamieszkania) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}

if (isset($_POST['stanowisko'])) {
    $dana = $conn->real_escape_string($_POST['stanowisko']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM doswiadczenie WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `doswiadczenie` SET `stanowisko`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `doswiadczenie` (id, stanowisko) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['nazwafirmy'])) {
    $dana = $conn->real_escape_string($_POST['nazwafirmy']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM doswiadczenie WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `doswiadczenie` SET `nazwa_firmy`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `doswiadczenie` (id, nazwa_firmy) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['lokalizacja'])) {
    $dana = $conn->real_escape_string($_POST['lokalizacja']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM doswiadczenie WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `doswiadczenie` SET `lokalizacja`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `doswiadczenie` (id, lokalizacja) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['zatrudnienieod'])) {
    $dana = $conn->real_escape_string($_POST['zatrudnienieod']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM doswiadczenie WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `doswiadczenie` SET `okres_zatrudnienia_od`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `doswiadczenie` (id, okres_zatrudnienia_od) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['zatrudnieniedo'])) {
    $dana = $conn->real_escape_string($_POST['zatrudnieniedo']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM doswiadczenie WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `doswiadczenie` SET `okres_zatrudnienia_do`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `doswiadczenie` (id, okres_zatrudnienia_do) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['obowiazki'])) {
    $dana = $conn->real_escape_string($_POST['obowiazki']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM doswiadczenie WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `doswiadczenie` SET `obowiazki`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `doswiadczenie` (id, obowiazki) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['nazwaszkolenia'])) {
    $dana = $conn->real_escape_string($_POST['nazwaszkolenia']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM kurs WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `kurs` SET `nazwa_szkolenia`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `kurs` (id, nazwa_szkolenia) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['organizator'])) {
    $dana = $conn->real_escape_string($_POST['organizator']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM kurs WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `kurs` SET `organizator`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `kurs` (id, organizator) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['data'])) {
    $dana = $conn->real_escape_string($_POST['data']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM kurs WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `kurs` SET `data`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `kurs` (id, data) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['umiejetnosci'])) {
    $dana = $conn->real_escape_string($_POST['umiejetnosci']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM umiejetnosc WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `umiejetnosc` SET `nazwa_umiejetnosci`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `umiejetnosc` (id, nazwa_umiejetnosci) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['nazwaszkoly'])) {
    $dana = $conn->real_escape_string($_POST['nazwaszkoly']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM wyksztalcenie WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `wyksztalcenie` SET `nazwa_szkoly`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `wyksztalcenie` (id, nazwa_szkoly) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['miejscowosc'])) {
    $dana = $conn->real_escape_string($_POST['miejscowosc']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM wyksztalcenie WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `wyksztalcenie` SET `miejscowosc`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `wyksztalcenie` (id, miejscowosc) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['poziomwyksztalcenia'])) {
    $dana = $conn->real_escape_string($_POST['poziomwyksztalcenia']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM wyksztalcenie WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `wyksztalcenie` SET `poziom_wyksztalcenia`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `wyksztalcenie` (id, poziom_wyksztalcenia) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['kierunek'])) {
    $dana = $conn->real_escape_string($_POST['kierunek']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM wyksztalcenie WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `wyksztalcenie` SET `kierunek`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `wyksztalcenie` (id, kierunek) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['uczeszczalod'])) {
    $dana = $conn->real_escape_string($_POST['uczeszczalod']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM wyksztalcenie WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `wyksztalcenie` SET `okres_od`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `wyksztalcenie` (id, okres_od) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['uczeszczaldo'])) {
    $dana = $conn->real_escape_string($_POST['uczeszczaldo']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM wyksztalcenie WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `wyksztalcenie` SET `okres_do`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `wyksztalcenie` (id, okres_do) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['nazwajezyka'])) {
    $dana = $conn->real_escape_string($_POST['nazwajezyka']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM jezyk WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `jezyk` SET `nazwa_jezyka`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `jezyk` (id, nazwa_jezyka) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
if (isset($_POST['poziomjezyka'])) {
    $dana = $conn->real_escape_string($_POST['poziomjezyka']);

    $conn->begin_transaction();


    $check_query = "SELECT * FROM jezyk WHERE id = $userId";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $query_konto = "UPDATE `jezyk` SET `poziom`='$dana' WHERE id=$userId";
    } else {
        $query_konto = "INSERT INTO `jezyk` (id, poziom) VALUES ($userId, '$dana')";
    }

    if (!$conn->query($query_konto)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        $conn->rollback();
        exit();
    }
    $conn->commit();
}
header('location:../profile/');
$conn->close();
?>