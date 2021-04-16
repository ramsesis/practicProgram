$(window).on('load', function() {

	$(".loader_inner").fadeOut();
	$(".loader").delay(400).fadeOut("slow");

});

function VisibleNoneOnBtn() {
	document.getElementById('SecTable1').style.display = "none";
	document.getElementById('SecTable2').style.display = "none";
	document.getElementById('SecTable3').style.display = "none";
	document.getElementById('SecRequests').style.display = "none";
	document.getElementById('SecTriggers').style.display = "none";
	document.getElementById('SecProcedures').style.display = "none";
}
// Событие открывающее 1 таблицу
$('#Table1').click(function() {
	VisibleNoneOnBtn();
	document.getElementById('SecTable1').style.display = "block";
});
// Событие открывающее 2 таблицу
$('#Table2').click(function() {
	VisibleNoneOnBtn();
	document.getElementById('SecTable2').style.display = "block";
});
// Событие открывающее 3 таблицу
$('#Table3').click(function() {
	VisibleNoneOnBtn();
	document.getElementById('SecTable3').style.display = "block";
});
// Событие открывающее запросы
$('#Requests').click(function() {
	VisibleNoneOnBtn();
	document.getElementById('SecRequests').style.display = "block";
});

$('input[type = "radio"]').click(function SelectedRadioButton() {
	var SelectedRadioBtn = $('input:checked').val();
	if(SelectedRadioBtn == "data_contragents") {
		document.getElementById('SelectedColumn').innerHTML = ('<option value="№ п/п">№ п/п</option><option value="Контрагент">Контрагент</option><option value="id_Контрагента">id_Контрагента</option><option value="Инн/Кпп">Инн/Кпп</option><option value="Юр. адрес организации">Юр. адрес организации</option><option value="Почта">Почта</option>');
	}
	if(SelectedRadioBtn == "данныепоперевозкам") {
		document.getElementById('SelectedColumn').innerHTML = ('<option value="№ п/п">№ п/п</option><option value="Контрагент">Контрагент</option><option value="id_Контрагента">id_Контрагента</option><option value="Загрузка">Загрузка</option><option value="Разгрузка">Разгрузка</option>');
	}
	if(SelectedRadioBtn == "данныепогрузу") {
		document.getElementById('SelectedColumn').innerHTML = ('<option value="№ п/п">№ п/п</option><option value="id_Контрагента">id_Контрагента</option><option value="Вес,т / объём,м³, груз">Вес,т / объём,м³, груз</option><option value="Ставка">Ставка</option>');
	}
});

$('#SubmitFormRequests').click(function() {
	var SelectedRadioBtn = $('input:checked').val();
	var SelectedComboBoxValue = $('#SelectedColumn').val();
	var UserSelectedTextValue = $('#ColumnValue').val();

	$.ajax({
		URL: "requests.php",
		Type: "POST",
		data: {
			SelectedRadioBtn: SelectedRadioBtn,
			SelectedComboBoxValue: SelectedComboBoxValue,
			UserSelectedTextValue: UserSelectedTextValue
		},
		success : function(data) {
			$.ajax({
				url : "requests.php",
				Type: "POST",
				success : function(data) {
					$('#ResultRequests').html(data);
				}
			});
		}
	});
});
