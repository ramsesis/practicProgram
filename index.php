<?php
	$db = @new mysqli("localhost","root","root","database");
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ru"> <!--<![endif]-->

<head>

	<meta charset="utf-8">

	<title>Database | View</title>
	<meta name="description" content="">

	<link rel="shortcut icon" href="img/favicon/bel.ico" type="image/x-icon">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap-grid.min.css">
	
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/media.css">

</head>

<body>

	<header>
		<div class="container">
			<div class="header__wrapper">
				<button id="Table1">Table1</button>
				<button id="Table2">Table2</button>
				<button id="Table3">Table3</button>
				<button id="Requests">Requests</button>
				<button id="Triggers">Triggers</button>
				<button id="Procedures">Procedures</button>
			</div>
		</div>
	</header>

	<section id="SecTable1">
		<div class="container">
			<table>
				<!-- Заполнение первой таблицы -->
				<?php
					$resultQuery = mysqli_query($db,"SELECT * FROM `data_contragents`");
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
				?>
			</table>
		</div>
	</section>
	<section id="SecTable2">
		<div class="container">
			<table>
				<!-- Заполнение второй таблицы -->
				<?php
					$resultQuery = mysqli_query($db,"SELECT * FROM `данныепоперевозкам`");
					while ($row = $resultQuery->fetch_assoc()) {
						echo "<tr>";
						echo '<td><span class="number">'.$row['№ п/п'].'</span></td>';
						echo '<td><span class="IDcontragent">'.$row['id_Контрагента'].'</span></td>';
						echo '<td><span class="contragent">'.$row['Контрагент'].'</span></td>';
						echo '<td><span class="loading">'.$row['Загрузка'].'</span></td>';
						echo '<td><span class="unloading">'.$row['Разгрузка'].'</span></td>';
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</section>
	<section id="SecTable3">
		<div class="container">
			<table>
				<!-- Заполнение третьей таблицы -->
				<?php
					$resultQuery = mysqli_query($db,"SELECT * FROM `данныепогрузу`");
					while ($row = $resultQuery->fetch_assoc()) {
						echo "<tr>";
						echo '<td><span class="number">'.$row['№ п/п'].'</span></td>';
						echo '<td><span class="IDcontragent">'.$row['id_Контрагента'].'</span></td>';
						echo '<td><span class="info">'.$row['Вес,т / объём,м³, груз'].'</span></td>';
						echo '<td><span class="total">'.$row['Ставка'].'</span></td>';
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</section>
	<section id="SecRequests">
		<div class="container">
			<form action="" method="post">
				<label for="Tables">
					<h3>Search Table</h3>
					<input type="radio" name="Table" id="RequestsTable1" value="1">
					<label for="SelectTable1">Table1</label><br/>
					<input type="radio" name="Table" id="RequestsTable2" value="2">
					<label for="SelectTable1">Table2</label><br/>
					<input type="radio" name="Table" id="RequestsTable3" value="3">
					<label for="SelectTable1">Table3</label><br/><br/><br/>
				</label>
				<label for="SelectedColumn">
					<h4>Selected Column</h4>
					<select name="SelectedColumn" id="SelectedColumn"></select>
				</label>
				<br/>
				<input type="text" name="ColumnValue" id="ColumnValue">
				<input type="submit" value="Submit">
			</form>
		</div>
	</section>
	<section id="SecTriggers">
		<div class="container"></div>
	</section>
	<section id="SecProcedures">
		<div class="container"></div>
	</section>
	
	<div class="hidden"></div>

	<div class="loader">
		<div class="loader_inner"></div>
	</div>

	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->

    <div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        
        <script src="js/common.js"></script>

		<script>
			$(window).on('load', function() {
				$(".loader_inner").fadeOut();
				$(".loader").delay(400).fadeOut("slow");
			});
		</script>

		<script>
			$('input[type = "radio"]').click(function SelectedRadioButton() {
				var SelectedRadioBtn = $('input:checked').val();
				if(SelectedRadioBtn == 1) {
					document.getElementById('SelectedColumn').innerHTML = ('<option value="1">№ п/п</option><option value="2">Контрагент</option><option value="3">id_Контрагента</option><option value="4">Инн/Кпп</option><option value="5">Юр. адрес организации</option><option value="6">Почта</option>');
				}
				if(SelectedRadioBtn == 2) {
					document.getElementById('SelectedColumn').innerHTML = ('<option value="1">№ п/п</option><option value="2">Контрагент</option><option value="3">id_Контрагента</option><option value="4">Загрузка</option><option value="5">Разгрузка</option>');
				}
				if(SelectedRadioBtn == 3) {
					document.getElementById('SelectedColumn').innerHTML = ('<option value="1">№ п/п</option><option value="2">id_Контрагента</option><option value="3">Вес,т / объём,м³, груз</option><option value="4">Ставка</option>');
				}
			});
	</script>
    </div>
	
</body>
</html>