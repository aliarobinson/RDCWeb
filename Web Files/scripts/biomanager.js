//Vars to represent the major elements of this page. 
//So many of them are reused across functions that it's easiest just to make them global

var showSelect = document.getElementById("showSelect");
var memberSelect = document.getElementById("memberSelect");
var bioInput = document.getElementById("biographyInput");
var saveButton = document.getElementById("saveButton");
var charCounter = document.getElementById("charCount");
var errorDisplay = document.getElementById("errorDisplay");

//The maximum allowed length for a bio
const MAXLENGTH = 400;

document.onload = setupDoc();

function setupDoc() {
	//Every time the value of the show select changes, the list of members must also change
	showSelect.onchange = onshowselect;
	//Every time the value of the member select changes, this implies that a new bio has been selected. If it exists, load it.
	memberSelect.onchange = onmemberselect;
	//When the "save" button is pressed, save the bioInput
	saveButton.onclick = onsavebio;
	//When the contents of the text area changes, recalculate the number of chars
	bioInput.onkeyup = onbiotextchange;
	bioInput.onchange = onbiotextchange;
};

function onshowselect() {
	var showId = showSelect.value;
	if(showId) {
		sendRequest("dbaction/getMembersInShow.php?id=" + showId, repopulateMembers);
	}
};

function onmemberselect() {
	var showId = showSelect.value;
	var memId = memberSelect.value;
	//TODO retrieve an existing bio
}

function onsavebio() {
	var showId = showSelect.value;
	var memId = memberSelect.value;
	var bioText = bioInput.value;
	if(bioText.length > MAXLENGTH) {
		errorDisplay.innerHTML = "That's too long. I wrote you this helpful counter and everything. Come on now.";
	}
	//TODO save this
}

function onbiotextchange() {
	var bioText = bioInput.value;
	var remainingLength = MAXLENGTH - bioText.length;
	charCounter.innerHTML = "Characters Left: " + remainingLength;
	if(remainingLength >= 0) {
		charCounter.style.color = "black";
		errorDisplay.innerHTML = "";
	}
	else {
		charCounter.style.color = "red";
	}
}

function repopulateMembers(memlist) {
	//Remember what was selected
	var prevSelect = memberSelect.value;
	
	//Clear existing options
	while(memberSelect.options.length > 0) {
		memberSelect.remove(0);
	}
	
	//Add default
	var defaultOption = document.createElement("option");
	defaultOption.text = "Select Member";
	defaultOption.value = "";
	memberSelect.add(defaultOption);
	
	//Add new options
	for(var i = 0; i < memlist.length; i++) {
		var newOption = document.createElement("option");
		newOption.text = memlist[i].Name;
		newOption.value = memlist[i].ID;
		memberSelect.add(newOption);
		
		//If this was already selected, keep it selected
		if(memlist[i].ID == prevSelect) {
			newOption.selected = true;
		}
	}
};

function sendRequest(requesturl, successfunc) {
	var ajax = new XMLHttpRequest();
	
	ajax.onreadystatechange = function () {

     if (ajax.readyState == 4 && (ajax.status == 200)) {           
		var arr = JSON.parse(ajax.responseText);
        successfunc(arr);
    }
}
	ajax.open("GET", requesturl, true);
	ajax.send();
	
};