// Constants for the role categories
var categories = ["Actor", "Tech", "Pit", "Director", "Guest"];
var rolesData;

document.onload = setupDoc();

function setupDoc() {
	// Assign button functionality
	var addDate = document.getElementById("add-date-input");
	addDate.onclick = addDatePicker;
	//loadCastInfo();
	setupCastInputs();
}

// Retrieves existing cast information from the show, if applicable
function loadCastInfo() {
	new Ajax.Request("url", {
        method: "get",
        onSuccess: functionName
    });
}

function setupCastInputs() {
	for(var i = 0; i < 5; i++) {
		addCastInput();
	}
}

// This adds a single row to the cast/crew table in the show editor
function addCastInput() {
	var table = document.getElementById("members-table");
	var nameinput = document.createElement("input"); // The input for the member name
	var roleinput = document.createElement("input"); // The input for the name of the role
	var categoryselect = document.createElement("select"); // The input for the role category
	var upbutton = document.createElement("input");
	var downbutton = document.createElement("input");
	
	nameinput.setAttribute("type", "text");
	nameinput.setAttribute("name", "memberName[]");
	roleinput.setAttribute("type", "text");
	roleinput.setAttribute("name", "roleName[]");
	upbutton.setAttribute("type", "button");
	upbutton.setAttribute("value", "Up");
	downbutton.setAttribute("type", "button");
	downbutton.setAttribute("value", "Down");
	
	//Add options to category select
	for(var i = 0; i < categories.length; i++) {
		var opt = document.createElement("option");
		opt.setAttribute("value", i);
		opt.innerHTML = categories[i];
		categoryselect.appendChild(opt);
	}
	
	//Add button behavior
	upbutton.onclick = moveRowUp;
	downbutton.onclick = moveRowDown;
	
	//Add the newly created inputs to the table row
	var row = table.insertRow(-1);
	var namecell = row.insertCell(0);
	namecell.appendChild(nameinput);
	var rolecell = row.insertCell(1);
	rolecell.appendChild(roleinput);
	var catcell = row.insertCell(2);
	catcell.appendChild(categoryselect);
	var upcell = row.insertCell(3);
	upcell.appendChild(upbutton);
	var downcell = row.insertCell(4);
	downcell.appendChild(downbutton);

}

// This adds a single date input to the show editor
function addDatePicker() {
	var container = document.getElementById("performance-date-container");
	var picker = document.createElement("input");
	picker.setAttribute("type", "datetime-local");
	picker.setAttribute("name", "showDate[]");
	container.appendChild(picker);
	container.appendChild(document.createElement("br"));
}

// When an up button is pressed, this moves the parent row up
function moveRowUp() {
	var row = this.parentNode.parentNode;
	if(row.rowIndex > 1) {
		var prevRow = row.previousSibling;
		prevRow.parentNode.removeChild(row);
		prevRow.parentNode.insertBefore(row, prevRow);
	}
}

// When a down button is pressed, this moves the parent row down
function moveRowDown() {
	var row = this.parentNode.parentNode;
	var nextRow = row.nextSibling;
	if(nextRow != null) {
		row.parentNode.removeChild(nextRow);
		row.parentNode.insertBefore(nextRow, row);
	}
}