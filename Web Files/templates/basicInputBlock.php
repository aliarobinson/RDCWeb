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