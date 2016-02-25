// Constants for the role categories
var categories = ["Director", "Production", "Actor", "Tech", "Pit", "Guest"];

document.onload = setupDoc();

function setupDoc() {
	// Assign button functionality
	var addDate = document.getElementById("add-date-input");
	addDate.onclick = addDatePicker;
	var inputform = document.getElementById("saveShow");
	inputform.setAttribute("autocomplete", "off");
	
	//Most of the code here can apply to both mainstage and short plays
	//However, a couple of things are different. 
	var typeinput = document.getElementById("script-type");
	var scripttype = typeinput.value;
	if(scripttype === "mainstage") {
		setupWriterInputDiv();
		setupCastInputs();
		var addCast = document.getElementById("add-cast-input");
		addCast.onclick = addManyCastInputs;
		var addWriter = document.getElementById("add-writer");
		addWriter.onclick = addWriterInput;
	}
	else if(scripttype === "shortplay") {
		var addShow = document.getElementById("add-show");
		addShow.onclick = setupShortPlayInputDiv;
		setupShortPlayInputDiv();
	}
	//Other inputs than this should not happen
}

function setupCastInputs() {
	var idinput = document.getElementById("id-input");
	var showId = idinput.getAttribute("value");
	//If we have a valid show ID, find the existing role information for this show
	if(showId && showId != "create") {
		for(var i = 0; i < categories.length; i++) {
			sendRequest(getMemberRequestString(showId, categories[i]), loadCastInfo, [categories[i]]);
		}
	}
	//If there isn't any existing info for this show, put ten inputs there by default
	else {
		addManyCastInputs();
		addManyCastInputs();
	}
}

function getMemberRequestString(showId, cat) {
	return "dbaction/getRolesInShow.php?id=" + showId + "&category=" + cat;
}

function loadCastInfo(members, cat) {
	var table = document.getElementById("members-table");
	for(var i = 0; i < members.length; i++) {
		addCastInput(members[i].MemberName, members[i].RoleName, cat[0], table, "");
	}
}

function addManyCastInputs() {
	var table = document.getElementById("members-table");
	addManyToTable(table, "");
}

function addManyToTable(table, index) {
	for(var i = 0; i < 5; i++) {
		addCastInput("", "", "Actor", table, index);
	}
}


// This adds a single row to the cast/crew table in the show editor
function addCastInput(memberName, characterName, category, table, index) {
	var nameinput = document.createElement("input"); // The input for the member name
	var roleinput = document.createElement("input"); // The input for the name of the role
	var categoryselect = document.createElement("select"); // The input for the role category
	var upbutton = document.createElement("input");
	var downbutton = document.createElement("input");
	
	nameinput.setAttribute("type", "text");
	nameinput.setAttribute("name", "memberName" + index + "[]");
	nameinput.setAttribute("list", "memberList");
	if(memberName) {
		nameinput.setAttribute("value", memberName);
	}
	roleinput.setAttribute("type", "text");
	roleinput.setAttribute("name", "roleName" + index + "[]");
	if(characterName) {
		roleinput.setAttribute("value", characterName);
	}
	categoryselect.setAttribute("name", "roleCategory" + index + "[]");
	upbutton.setAttribute("type", "button");
	upbutton.setAttribute("value", "Up");
	upbutton.className = "button";
	downbutton.setAttribute("type", "button");
	downbutton.setAttribute("value", "Down");
	downbutton.className = "button";
	
	//Add options to category select
	for(var i = 0; i < categories.length; i++) {
		var opt = document.createElement("option");
		//opt.setAttribute("value", i);
		opt.innerHTML = categories[i];
		if(categories[i] == category) {
			opt.setAttribute("selected", "selected");
		}
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

//This sets up the input for a show's basic information
function createBasicInfoInput(index) {
	var outerdiv = document.createElement("div");
	outerdiv.className = "thumb-wrap";
	var titlediv = document.createElement("div");
	var subtitlediv = document.createElement("div");
	var synopsisdiv = document.createElement("div");
	
	var titleinput = document.createElement("input");
	var titletip = document.createElement("span");
	titletip.innerHTML = "Title: ";
	titleinput.setAttribute("type", "text");
	titleinput.setAttribute("name", "showTitle" + index);
	titleinput.id = "titleinput" + index;
	titleinput.onchange = updateTitle;
	titlediv.appendChild(titletip);
	titlediv.appendChild(titleinput);
	
	var subtitleinput = document.createElement("input");
	var subtitletip = document.createElement("span");
	subtitletip.innerHTML = "Subtitle: ";
	subtitleinput.setAttribute("type", "text");
	subtitleinput.setAttribute("name", "showSubtitle" + index);
	subtitlediv.appendChild(subtitletip);
	subtitlediv.appendChild(subtitleinput);
	
	var synopsisinput = document.createElement("textarea");
	var synopsistip = document.createElement("span");
	synopsistip.innerHTML = "Synopsis: ";
	synopsisinput.setAttribute("form", "saveShow");
	synopsisinput.setAttribute("name", "showSynopsis" + index);
	synopsisdiv.appendChild(synopsistip);
	synopsisdiv.appendChild(document.createElement("br"));
	synopsisdiv.appendChild(synopsisinput);
	
	outerdiv.appendChild(titlediv);
	outerdiv.appendChild(subtitlediv);
	outerdiv.appendChild(synopsisdiv);
	return outerdiv;
}

function createCastInputDiv(index) {
	var outerdiv = document.createElement("div");
	outerdiv.className = "content-item";
	var membertable = document.createElement("table");
	outerdiv.appendChild(membertable);
	addManyToTable(membertable, index);
	
	var addbutton = document.createElement("input");
	addbutton.setAttribute("type", "button");
	addbutton.setAttribute("value", "Add");
	addbutton.onclick = function() {
		addManyToTable(membertable, index);
	}
	outerdiv.appendChild(addbutton);
	return outerdiv;
}

function createWriterInputDiv(name, role, index) {
	var outer = document.createElement("p");
	var writerouter = document.createElement("div");
	var writerinput = document.createElement("input");
	writerinput.setAttribute("type", "text");
	writerinput.setAttribute("name", "showWriter" + index + "[]");
	if(name) {
		writerinput.value = name;
	}
	writerouter.innerHTML = "Writer: ";
	writerouter.appendChild(writerinput);
	
	var roleouter = document.createElement("div");
	var roleinput = document.createElement("input");
	roleinput.setAttribute("type", "text");
	roleinput.setAttribute("name", "showWriterRole" + index + "[]");
	if(role) {
		roleinput.value = role;
	}
	roleouter.innerHTML = "Role (Script, Music, Lyrics, etc.): ";
	roleouter.appendChild(roleinput);
	
	outer.appendChild(writerouter);
	outer.appendChild(roleouter);
	return outer;
}

function createOuterWriterInputBlock(index) {
	var secondDiv = document.createElement("div");
	var addWriterButton = document.createElement("input");
	addWriterButton.setAttribute("type", "button");
	addWriterButton.id = "add-writer" + index;
	addWriterButton.value = "Add Writer";
	addWriterButton.onclick = addWriterInput;
	secondDiv.appendChild(addWriterButton);
	
	var studentCheckbox =document.createElement("input");
	studentCheckbox.setAttribute("type", "checkbox");
	studentCheckbox.setAttribute("name", "studentWritten");
	var newspan = document.createElement("span");
	newspan.innerHTML = "Student-Written";
	secondDiv.appendChild(studentCheckbox);
	secondDiv.appendChild(newspan);
	return secondDiv;
}

function setupShortPlayInputDiv() {
	var outer = document.getElementById("show-forms");
	var index = outer.childElementCount;
	
	var wrapper = document.createElement("div");
	wrapper.className = "content-item";
	wrapper.id = "shortplay" + index;
	
	var header = document.createElement("h1");
	header.innerHTML = "New Show";
	wrapper.appendChild(header);
	wrapper.appendChild(createBasicInfoInput(index));
	
	var writerWrap = document.createElement("div");
	writerWrap.className = "thumb-wrap";
	writerWrap.appendChild(createOuterWriterInputBlock(index));
	
	var writerinputblock = document.createElement("div");
	writerinputblock.id = "writer-inputs" + index;
	writerWrap.appendChild(writerinputblock);
	writerinputblock.appendChild(createWriterInputDiv("", "", index));
	
	wrapper.appendChild(writerWrap);
	wrapper.appendChild(createCastInputDiv(index));
	
	outer.appendChild(wrapper);
}

function setupWriterInputDiv() {
	var allinputs = document.getElementById("writer-inputs");
	var idinput = document.getElementById("id-input");
	var showId = idinput.getAttribute("value");
	
	//If we have a valid show ID, find the existing writer information for this show
	if(showId && showId != "create") {
		sendRequest("dbaction/getWritersInShow.php?id=" + showId, createWriterInputs, new Array() );
	}
	//If there isn't any existing info for this show, add an empty input 
	else {
		allinputs.appendChild(createWriterInputDiv("", "", ""));
	}
}

function createWriterInputs(info, args) {
	var index = "";
	if(args.length > 0) {
		index = args[0];
	}
	var parentinput = document.getElementById("writer-inputs" + index);
	for(var i = 0; i < info.length; i++) {
		parentinput.appendChild(createWriterInputDiv(info[i].Name, info[i].Role, index));
	}
}

function addWriterInput() {
	var index = this.id.substring(10);
	var parentinput = document.getElementById("writer-inputs" + index);
	parentinput.appendChild(createWriterInputDiv("", "", index));
}

function updateTitle() {
	var newTitle = this.value;
	if(!this.value || this.value.length == 0) {
		this.value = "New Show";
	}
	var index = this.id.substring(10);
	var shortplaydiv = document.getElementById("shortplay" + index);
	var header = shortplaydiv.getElementsByTagName("h1")[0];
	header.innerHTML = newTitle;
}

function sendRequest(requesturl, successfunc, args) {
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function () {

     if (ajax.readyState == 4 && (ajax.status == 200)) {           
		var arr = JSON.parse(ajax.responseText);
        successfunc(arr, args);
		}
	}
	ajax.open("GET", requesturl, true);
	ajax.send();
	
};