<?php require_once("dateUtils.php"); ?>

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
