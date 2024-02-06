<?php
session_start();




include '../logowanie/config.php';
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
//zapisywanie do bazy
if(isset($_POST['email'])){
    $query = "UPDATE `konto` SET `email`=$_POST[email] WHERE id=$userId";
}

$conn->close();
?>