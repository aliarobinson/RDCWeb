<?php
//require_once("titanConnect.php");
//require("dbaction/dbRetrieveInfo.php");
require_once("dateUtils.php");

function printWriterInput($writerInfo) { ?>
	<p><div>Writer:<input type="text" name="showWriter[]"></div>
	<div> Role (Script, Music, Lyrics, etc.): <input type="text" name="showWriterRole[]"></div></p>
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

function printAllMembersDatalist() {
		$allMembers = getAllMembers();
		printMemberDatalist($allMembers);
	}
	
function printMemberDatalist($memberArray) { ?>
	<datalist id='memberList'>
	<?php foreach($memberArray as $mem): ?>
		<option value='<?=$mem['Name']?>'></option>
	<?php endforeach; ?>
	</datalist>
<?php }

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
	<select form='<?=$formName?>' name="season-input">
		<?php for($i = $last; $i > 2000; $i--): ?>
			<option value=<?=$i?>
				<?php if($i == $currentyear): ?>
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