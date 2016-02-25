$(document).ready(setup);

const loadingGif = "stock/loading.gif";
const newMemberTipText = "It looks like these members are new to RDC. Please input the grad year for each new member:";

//Called on load
function setup() {
	$('#saveShow').submit(validateShowInput);
}

//Called on form submission to validate all input
function validateShowInput() {
	$('#save-show-dialog').bPopup( {
		modalClose: false
	});
	
	memberNames = new Array();
	$('input[name^="memberName"]').each(function() {
		memberNames.push(this.value);
	});
	$.ajax({
		type: "POST",
		url: "dbaction/validateShowInfo.php",
		data: {
			"memberName" : memberNames
		},
		success: createNewMemberDialog
		
	});
	return false;
}

//Called after validateShowInput successfully completes its post request
function createNewMemberDialog(result) {
	var newMembers = JSON.parse(result);
	if(newMembers.length == 0) {
		submitShowForm();
	}
	createNewMemberYearInputs(newMembers);
}

//Called when there are members in this show that do not correspond to exisitng rdc members
//The values of the array correspond to the new members
function createNewMemberYearInputs(memberArray) {
	
	//Create a table of inputs for providing values for each new member's grad year
	var table = $("<table><tbody></tbody></table>");
	$.each(memberArray, function() {
		table.append($('<tr>')
			.append($('<td>').html(this))
			.append($('<td>')
				.append(createGradYearSelect())));
				//.append($('<input type="text" name="newMemberName[]">'))));
	});
	
	var saveDialog = $('#save-show-dialog');
	saveDialog.empty();
	saveDialog.append($('<p>').html(newMemberTipText));
	saveDialog.append(table);
	saveDialog.append($('<input class="button" id="final-save" type="button" value="Save">')
		.click(function() {
			saveNewMembers(memberArray);
		}));
	saveDialog.append($('<input class="button" id="final-skip" type="button" value="Skip">').click(function() {
			saveNewMembers(memberArray);
		}));
	
}

//Creates a select populated with the relevant year options
function createGradYearSelect() {
	var currentYear = new Date().getFullYear();
	var maximum = currentYear + 7; // This should cover just about everyone
	
	//By default, provide a N/A option for non-students
	var newSelect = $('<select class="new-member-grad-year">').append($('<option>').attr('selected', 'selected').text("N/A"));
	
	//Populate a select with several year options.
	for(var i = maximum; i > 2000; i--) {
		newSelect.append($('<option>').text(i));
	}
	return newSelect;
}

function saveNewMembers(memberArray) {
	var memberData = {};
	var gradYears = $('.new-member-grad-year');
	
	for(var i = 0; i < memberArray.length; i++) {
		var sel = gradYears[i];
		memberData[memberArray[i]] = sel.options[sel.selectedIndex].text;
	}
	
	$.ajax({
		type: "POST",
		url: "dbaction/createMembers.php",
		data: {
			"memberData" : JSON.stringify(memberData)
		},
		success: submitShowForm
	});
}

function submitShowForm() {
	$('#saveShow').submit();
}