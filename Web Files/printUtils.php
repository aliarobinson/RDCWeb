<?php
function printBasicInputBlock($info) { 
?>
	<div class="thumb-wrap">
		<h2>General Information</h2>
		<div>Title (Required):<input type="text" name="showTitle" 
			<?php if(isset($info['Title'])) { echo("value='" . $info['Title'] . "'"); } ?> ></div>
		<div>Subtitle (Not required):<input type="text" name="showSubtitle" 
			<?php if(isset($info['Subtitle'])) { echo("value='" . $info['Subtitle'] . "'"); } ?> ></div>
		<div>Synopsis (Max 800 characters):<br>
			<textarea name="showSynopsis" form="saveShow"><?php if(isset($info['Synopsis'])) { echo($info['Synopsis']); } ?></textarea>
		</div>
	</div>
<?php }

function printDateInputBlock($dateArray) { 
?>
	<div class="thumb-wrap">
		<h2>Performance Dates</h2>
		<div id="performance-date-container" >
			<?php
				//This assumes that most rdc productions will have 5 performances.
				for($j = 0; $j < 5; $j++) { ?>
					<input type="datetime-local" name="showDate[]" /> <br>
				<?php } ?>
		</div>
		<input type="button" id="add-date-input" value="Add">
	</div>
<?php }

function printMemberInputBlock() {
?>
	<div class="content-item">
		<h2>Cast and Crew</h2>
			<table id="members-table">
			<tr><td>Member Name</td><td>Role</td><td>Role Type</td>
			<!-- The restrictions on these inputs are so specific that I'm just going to use javascript to add them --></table>
		<input type="submit">
	</div>
<?php }

?>