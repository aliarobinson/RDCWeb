<?php
require_once("dateUtils.php");

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
		<div id="writer-inputs">
		</div>
		<div><input type="button" id="add-writer" class="button" value="Add Writer" /><input type="checkbox" name="studentWritten">Student-written</input></div>
	</div>
<?php }

function printWriterInput($writerInfo) { ?>
	<p><div>Writer:<input type="text" name="showWriter[]"></div>
	<div> Role (Script, Music, Lyrics, etc.): <input type="text" name="showWriterRole[]"></div></p>
<?php }

function printDateInputBlock($dateArray) { 
?>
	<div class="thumb-wrap">
		<h2>Performance Dates</h2>
		<div id="performance-date-container" >
			<?php
				//This assumes that most rdc productions will have 5 performances.
				$count = 0;
				if(isset($dateArray)) {
					foreach($dateArray as $d) { 
						$formattedDate=getHTMLDateFormat($d['EventDate']);
						?>
						<input type="datetime-local" name="showDate[]" value='<?= $formattedDate ?>' /> <br>
				<?php	$count++;
					} 
				}
				
				for($j = $count; $j < 5; $j++) { ?>
					<input type="datetime-local" name="showDate[]" /> <br>
				<?php } ?>
		</div>
		<input type="button" class="button" id="add-date-input" value="Add">
	</div>
<?php }

// memberArray represents an associative array of roles and names retrieved from the show information.
// This function prints the names in a table format
function printMembersAsTableRows($memberArray, $numColumns) {
	echo("<table>");
	$roleIndex = 0;
	while($roleIndex < count($memberArray)) {
		echo("<tr>");
		for($i = 0; ($i < $numColumns && $roleIndex < count($memberArray)); $i++) {
			$role = $memberArray[$roleIndex];
			echo("<td>");
			echo($role["RoleName"]);
			echo("</td><td>");
			echo($role["MemberName"]);
			echo("</td>");
			
			$roleIndex++;
		}
		echo("</tr>");
	}
	echo("</table>");
}

function printMembersAsNameList($memberArray) {
	if(count($memberArray) > 0) {
		for($i = 0; $i < count($memberArray) - 1; $i++) {
			echo($memberArray[$i]["MemberName"]);
			echo(", ");
		}
	echo($memberArray[count($memberArray) - 1]["MemberName"]);
	}
}

function printQuarterSelect($formName) { ?>
	<select form=<?=$formName?> name="quarter-input">
		<option>Fall</option>
		<option>Winter</option>
		<option>Spring</option>
	</select>
<?php }

function printSeasonSelect($formName) {
	//The current year
	$currentyear= date("Y");
	//last represents the last season that is available for editing
	//Two years into the future should be more than enough for practical purposes
	$last = $currentyear + 2;
?>
	<select form=<?=$formName?> name="season-input">
		<?php for($i = $last; $i > 2000; $i--): ?>
			<option value=<?=$i?>
				<?php // Ensure that the current year is selected by default
				if($i == $currentyear): ?>
					selected='selected'
				<?php endif; ?>>
			<?= getSeasonString($i) ?></option>
		<?php endfor; ?>
	</select>

<?php }

/*function printMemberInputBlock() {
?>
	<div class="content-item">
		<h2>Cast and Crew</h2>
			<table id="members-table">
			<tr><td>Member Name</td><td>Role</td><td>Role Type</td>
			<!-- The restrictions on these inputs are so specific that I'm just going to use javascript to add them --></table>
		<input id="add-cast-input" type="button" value="Add"><input id="save-show-info" type="submit" value="Save">
	</div>
<?php } */

?>