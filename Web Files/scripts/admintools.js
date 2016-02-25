$(document).ready(setupDoc);
var addShowStatus = 0;

function setupDoc() {
	// Assign form validation functions
	var addshow = $("#add-show").submit(validateShowInput);
	var addshort = $("#add-short-plays").submit(validateShortInput);
	//addshow.onsubmit = validateShowInput;
	//addshort.onsubmit = validateShortInput;
}

function validateShowInput() {
	//If the user has already been warned, go ahead and let them create a new show
	if(addShowStatus != 0) {
		return true;
	}
	addShowStatus = 0;
	var warning = "";
	//TODO validate quarter and season inputs
	var showTitle = $("#show-title").val();
	$("#show-select option").each(function() {
		if(showTitle.toUpperCase() === this.text.trim().toUpperCase()) {
			addShowStatus = 3;
			warning = "Warning: A show with that name already exists. Are you sure?";
		}
	});
	if(addShowStatus === 0)
		return true;
	var warningDisplay = $("#err-msg", this);
	warningDisplay.text(warning);
	return false;
}

function validateShortInput() {
	var warningDisplay = $("#err-msg", this);
	warningDisplay.text("Not Implemented");
	return false;
}
