var date = new Date();
var currentMonth = date.getMonth();
var currentDate = date.getDate();
var currentYear = date.getFullYear();

$(function(){
	$("#datepicker").datepicker({
		minDate: new Date(currentYear, currentMonth, currentDate),
		dateFormat: "yy-mm-dd"
	});
});