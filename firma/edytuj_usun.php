<?php
session_start();
@include '../config.php';
if($_GET['edit'] != "")
{

    $query = "SELECT * FROM ogloszenie WHERE id=".$_GET['id'];
    $result = ($conn->query($query))->fetch_array();
?>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="../style.css" />
  <form method="GET" action="edytuj_oglo.php">
    <input type="hidden" name='id' value="<?php echo $_GET['id'] ?>">
                <label for="nazwaStanowiska" class="form-label" style="width:500px;margin-left:15px;margin-top:15px">Nazwa</label>
                <input type="text" name="nazwaogloszenia" value="<?php echo $result['nazwa'] ?>"  required class="form-control" id="nazwaogloszeniaa" aria-describedby="nazwaStanowiskaHelp" style="width:500px;margin-left:15px">
                <label for="kategoria" class="form-label" style="width:500px;margin-left:15px">Kategoria:</label>
                <select name="kategoriao" class="form-select" require style="width:500px;margin-left:15px">
                    <?php
                        $sql = "SELECT * FROM kategoria";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            if($row['kategoria'] == $result['kategoria'])
                            {
                                echo "<option selected>".$row['kategoria']."</option>";
                            }else{
                                echo "<option>".$row['kategoria']."</option>";
                            }
                           
                        }
                    ?>
                </select>
                <label for="kategoria" class="form-label" style="width:500px;margin-left:15px">Poziom Stanowiska:</label>
                <select name="poziomstanowiska" class="form-select" require style="width:500px;margin-left:15px">
                    <?php
                        $sql = "SELECT * FROM poziom_stanowiska";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            if($row['poziom_stanowiska'] == $result['poziom_stanowiska'])
                            {
                                echo "<option selected>".$row['poziom_stanowiska']."</option>";
                            }else{
                                echo "<option>".$row['poziom_stanowiska']."</option>";
                            }
                           
                        }
                    ?>
                </select>
                <label for="rodzajumowy" class="form-label" style="width:500px;margin-left:15px">Rodzaj Umowy:</label>
                <select name="rodzajumowyy" class="form-select" require style="width:500px;margin-left:15px">
                    <?php
                        $sql = "SELECT * FROM rodzaj_umowy";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            if($row['rodzaj_umowy'] == $result['rodzaj_umowy'])
                            {
                                echo "<option selected>".$row['rodzaj_umowy']."</option>";
                            }else{
                                echo "<option>".$row['rodzaj_umowy']."</option>";
                            }
                           
                        }
                    ?>
                </select>
                <label for="rodzajumowy" class="form-label" style="width:500px;margin-left:15px">Wymiar Etatu:</label>
                <select name="wymiaretatuu" class="form-select" require style="width:500px;margin-left:15px">
                    <?php
                        $sql = "SELECT * FROM wymiar_etatu";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            if($row['wymiar_etatu'] == $result['wymiar_etatu'])
                            {
                                echo "<option selected>".$row['wymiar_etatu']."</option>";
                            }else{
                                echo "<option>".$row['wymiar_etatu']."</option>";
                            }
                           
                        }
                    ?>
                </select>
                <label for="rodzajumowy" class="form-label" style="width:500px;margin-left:15px">Rodzaj Pracy:</label>
                <select name="rodzajpracyy" class="form-select" require style="width:500px;margin-left:15px">
                    <?php
                        $sql = "SELECT * FROM rodzaj_pracy";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            if($row['rodzaj_pracy'] == $result['rodzaj_pracy'])
                            {
                                echo "<option selected>".$row['rodzaj_pracy']."</option>";
                            }else{
                                echo "<option>".$row['rodzaj_pracy']."</option>";
                            }
                           
                        }
                    ?>
                </select>
                <label for="wynagrodzenie" class="form-label" style="width:500px;margin-left:15px">Wynagrodzenie</label>
                <input type="text" name="wynagrodzenie" value="<?php echo $result['widelki_wynagrodzenia'] ?>"  required class="form-control" id="nazwaogloszeniaa" aria-describedby="nazwaStanowiskaHelp" style="width:500px;margin-left:15px">
                <label for="dnipracyod" class="form-label" style="width:500px;margin-left:15px">Dni pracy od:</label>
                <select name="dnipracyod" class="form-select" require style="width:500px;margin-left:15px">
                    <?php
                        $sql = "SELECT * FROM dni_pracy";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            if($row['dni_pracy'] == (explode('-', $result['dni_pracy']))[0])
                            {
                                echo "<option selected>".(explode('-', $result['dni_pracy']))[0]."</option>";
                            }else{
                                echo "<option>".$row['dni_pracy']."</option>";
                            }
                           
                        }
                    ?>
                </select>
                <label for="dnipracydo" class="form-label" style="width:500px;margin-left:15px">Dni pracy do:</label>
                <select name="dnipracydo" class="form-select" require style="width:500px;margin-left:15px">
                    <?php
                        $sql = "SELECT * FROM dni_pracy";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            if($row['dni_pracy'] == (explode('-', $result['dni_pracy']))[1])
                            {
                                echo "<option selected>". (explode('-', $result['dni_pracy']))[1]."</option>";
                            }else{
                                echo "<option>".$row['dni_pracy']."</option>";
                            }
                           
                        }
                    ?>
                </select>
                <label for="godzinypracyod" class="form-label" style="width:500px;margin-left:15px">Godziny Pracy od:</label>
                <select name="godzinypracyod" class="form-select" require style="width:500px;margin-left:15px">
                    <?php
                        $sql = "SELECT * FROM godziny_pracy";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            if($row['godziny_pracy'] == (explode('-', $result['godziny_pracy']))[0]) {
                                echo "<option selected>". (explode('-', $result['godziny_pracy']))[0]."</option>";
                            } else {
                                echo "<option>".$row['godziny_pracy']."</option>";
                            }
                        }
                    ?>
                </select>
                <label for="godzinypracydo" class="form-label" style="width:500px;margin-left:15px">Godziny Pracy do:</label>
                <select name="godzinypracydo" class="form-select" require style="width:500px;margin-left:15px">
                    <?php
                        $sql = "SELECT * FROM godziny_pracy";
                        $resultt = $conn->query($sql);
                        while ($row = $resultt->fetch_assoc()) {
                            if($row['godziny_pracy'] == (explode('-', $result['godziny_pracy']))[1])
                            {
                                echo "<option selected>". (explode('-', $result['godziny_pracy']))[1]."</option>";
                            }else{
                                echo "<option>".$row['godziny_pracy']."</option>";
                            }
                           
                        }
                    ?>
                </select>
                <?php

                 $query = "SELECT * FROM ogloszenie WHERE id=".$_GET['id'];
                 $result = ($conn->query($query))->fetch_array();
                 ?>
                <div class = "mb-3">
            <label for="nazwaStanowiska" class="form-label" style="width:500px;margin-left:15px">Data ważności:</label>
                <input type="Date" name="datawaznosci" value="<?php echo $result['data_waznosci'] ?>"  class="form-control" id="nazwaStanowiska" aria-describedby="nazwaStanowiskaHelp" required style="width:500px;margin-left:15px">
                      </div>
                        <div class="mb-3">
                        <label for="rodzajPracy" class="form-label" style="width:500px;margin-left:15px">Zakres obowiązków:</label>
                <textarea class="form-control" required id="exampleFormControlTextarea1"    name="zakresobowiazkow" rows="3" style="width:500px;margin-left:15px"><?php echo $result['zakres_obowiazkow'] ?></textarea>
                      </div>

                <div class="mb-3">

                <label for="" class="form-label" style="width:500px;margin-left:15px">Wymagania kandydata:</label>
                <textarea class="form-control" required id="exampleFormControlTextarea1" name="wymaganiakandydata"    rows="3" style="width:500px;margin-left:15px"><?php echo $result['wymagania_kandydata'] ?></textarea>
                      </div>
                      <div class="mb-3">

                      <label for="" class="form-label" style="width:500px;margin-left:15px">Oferowane benefity:</label>
                <textarea class="form-control" required id="exampleFormControlTextarea1" name="oferowanebenfity"   rows="3" style="width:500px;margin-left:15px"><?php echo $result['oferowane_benefity'] ?></textarea>
                      </div>
                      <div class="mb-3">

                      <label for="" class="form-label" style="width:500px;margin-left:15px">Informacje firmy:</label>
                <textarea class="form-control" required id="exampleFormControlTextarea1" name="informacjeFirmy"  rows="3" style="width:500px;margin-left:15px"><?php echo $result['informacje_o_firmie'] ?></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary" style="margin-left:15px">Edytuj</button>
                    </form>
<br><br><br><br><br>
<?php
}
else if ($_GET['delete'] != "")
{

    $query = "DELETE FROM `".$_GET['tabela'] ."` WHERE id = ". $_GET['id'];
    $result = $conn->query($query);
    header('location:../firma/firma-panel.php');
}
?>