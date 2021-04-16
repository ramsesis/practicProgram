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