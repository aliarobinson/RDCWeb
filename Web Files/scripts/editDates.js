//This can be used to input dates for any event

$(document).ready(dateSetup);

//Called when the document loads, assigns functionality to buttons
function dateSetup() {
	$('#add-date-input').click(addDatePicker);
}

//Appends a single date input to the set of date inputs
function addDatePicker() {
	$('#performance-date-container').append($('<input>').attr({
		'type' : 'datetime-local',
		'name' : 'showDate[]'
	})).append('<br>');
}