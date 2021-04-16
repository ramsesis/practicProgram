<?php
    $db = @new mysqli("localhost","root","root","database");

    $table = $_POST['SelectedRadioBtn'];
    $column = $_POST['SelectedComboBoxValue'];
    $userValue = $_POST['UserSelectedTextValue'];

    $queryCommand = mysqli_query('SELECT * FROM '.$table.' WHERE '.$column.' = '.$userValue);

    if($table == "data_contragents") {
        while ($row = $resultQuery->fetch_assoc()) {
            echo "<tr>";
            echo '<td><span class="number">'.$row['№ п/п'].'</span></td>';
            echo '<td><span class="IDcontragent">'.$row['id_Контрагента'].'</span></td>';
            echo '<td><span class="contragent">'.$row['Контрагент'].'</span></td>';
            echo '<td><span class="InnKpp">'.$row['Инн/Кпп'].'</span></td>';
            echo '<td><span class="adress">'.$row['Юр. адрес организации'].'</span></td>';
            echo '<td><span class="mail">'.$row['Почта'].'</span></td>';
            echo "</tr>";
        }
    }

    if($table == "данныепоперевозкам") {
        while ($row = $resultQuery->fetch_assoc()) {
            echo "<tr>";
            echo '<td><span class="number">'.$row['№ п/п'].'</span></td>';
            echo '<td><span class="IDcontragent">'.$row['id_Контрагента'].'</span></td>';
            echo '<td><span class="contragent">'.$row['Контрагент'].'</span></td>';
            echo '<td><span class="loading">'.$row['Загрузка'].'</span></td>';
            echo '<td><span class="unloading">'.$row['Разгрузка'].'</span></td>';
            echo "</tr>";
        }
    }

    if($table == "данныепогрузу") {
        while ($row = $resultQuery->fetch_assoc()) {
            echo "<tr>";
            echo '<td><span class="number">'.$row['№ п/п'].'</span></td>';
            echo '<td><span class="IDcontragent">'.$row['id_Контрагента'].'</span></td>';
            echo '<td><span class="info">'.$row['Вес,т / объём,м³, груз'].'</span></td>';
            echo '<td><span class="total">'.$row['Ставка'].'</span></td>';
            echo "</tr>";
        }
    }
?>