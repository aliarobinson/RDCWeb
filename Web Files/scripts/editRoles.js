// Constants for the role categories
var categories = ["Director", "Production", "Actor", "Tech", "Pit", "Guest"];

$(document).ready(castSetup);

function castSetup() {
	setupExistingShows();
}

function setupExistingShows() {
	/*var temp = [0, 1, 2];
	$.each(temp, function(){
		$('#show-forms').append(setupCastInputBlock(this));
	});*/
}

function setupCastInputBlock(index) {
	return $('<div>').addClass('content-item')
		.append($('<h3>').html('Cast and Crew'))
		.append($('<table>').attr('id', 'members-table' + index)
			.append($('<tr>')
				.append($('<td>').html('Role'))
				.append($('<td>').html('Member Name'))
				.append($('<td>').html('Category'))))
		.append($('<input>').attr({
			'type' : 'button',
			'value' : 'Add'
		}).click(function() {
			addManyCastInputs(index);
		}));
}

//Create a single table row with the necessary table inputs
function createCastInput(memberName, characterName, category, index) {
	//A text input for the name of the RDC member
	var nameinput = $('<input />').attr({
		'type' : 'text',
		'name' : 'memberName' + index + '[]',
		'list' : 'memberList'
	});
	if(memberName) {
		nameinput.attr('value', memberName);
	}
	
	//A text input for the name of the character or position
	var roleinput = $('<input />').attr({
		'type' : 'text',
		'name' : 'roleName' + index + '[]'
	});
	if(characterName) {
		roleinput.attr('value', characterName);
	}
	
	//The category of the role, selected from a list
	var categoryselect = createCategorySelect(category, index);
	
	//Up/down buttons to rearrange the billing order of the members
	var upbutton = $('<input />').addClass('button').attr( {
		'type' : 'button',
		'value' : 'Up'
	}).click(moveRowUp);
	var downbutton = $('<input />').addClass('button').attr( {
		'type' : 'button',
		'value' : 'Down'
	}).click(moveRowDown);
	
	return $('<tr>').append($('<td>').append(roleinput)).append($('<td>').append(nameinput))
		.append($('<td>').append(categoryselect)).append($('<td>').append(upbutton)).append($('<td>').append(downbutton));
}

//Creates a single, empty cast input with no existing values
function createEmptyCastInput() {
	return createCastInput(null, null, null, '');
}

//Creates a non-indexed cast input (used for mainstage shows, not short plays)
function createNonIndexedCastInput(memberName, characterName, category) {
	return createCastInput(memberName, characterName, category, '');
}

//Called when an "add" button is pressed to create several inputs at once
function addManyCastInputs(index) {
	for(var i = 0; i < 5; i++) {
		$('#members-table' + index).append(createCastInput(null, null, null, index));
	}
}

//Creates a select populated with category options
function createCategorySelect(existing, index) {
	var catSelect = $('<select>').attr('name', 'roleCategory' + index + '[]');
	$.each(categories, function() {
		var opt = $('<option>').html(this);
		if(existing && existing == this) {
			opt.attr('selected', 'selected');
		}
		else if(this == 'Actor') {
			opt.attr('selected', 'selected');
		}
		catSelect.append(opt);
	});
	return catSelect;
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