$(document).ready(shortPlaySetup);

function shortPlaySetup() {
	$('#add-show').click(setupShortPlayInputDiv);
	setupShortPlayInputDiv();
}

function setupShortPlayInputDiv() {
	var outer = $('#show-forms');
	var index = outer.children().length;
	
	outer.append($('<div>').attr('id', 'shortplay' + index).addClass('content-item')
		.append($('<h1>').html('New Show'))
		.append(createBasicInfoInput(index))
		.append(setupCastInputBlock(index)));
	addManyCastInputs(index);
}

function createBasicInfoInput(index) {
	return $('<div>').addClass('thumb-wrap')
		.append($('<div>') //The title input
			.append($('<span>').html('Title: '))
			.append($('<input>').attr({
				'id' : 'titleinput' + index,
				'type' : 'text',
				'name' : 'showTitle' + index
			}).change(updateTitle)))
		.append($('<div>') //The subtitle input
			.append($('<span>').html('Subtitle: '))
			.append($('<input>').attr({
				'id' : 'subtitleinput' + index,
				'type' : 'text',
				'name' : 'showSubtitle' + index
			})))
		.append($('<div>') //The synopsis input
			.append($('<span>').html('Synopsis: '))
			.append($('<br>'))
			.append($('<textarea>').attr({
				'id' : 'synopsisinput' + index,
				'form' : 'saveShow',
				'name' : 'showSynopsis' + index
			})));
}

function updateTitle() {
	var newTitle = this.value;
	if(!newTitle || newTitle.length == 0) {
		newTitle = 'New Show'
	}
	var titleHeader = $('#shortplay' + this.id.substring(10)).find("h1")[0];
	titleHeader.innerHTML = newTitle;
}