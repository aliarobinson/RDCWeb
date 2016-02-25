<?php

	function getYear($datestring) {	
		$date = new DateTime($datestring);
		$y = $date->format('Y');
		$yearcutoff = new DateTime($y ."-06-01T00:00");
		if($date < $yearcutoff) {
			return $y - 1;
		}
		else {
			return $y;
		}
		
	}
	
	function getQuarter($dateString) {
		$date = new DateTime($dateString);
		$m = $date->format('m');
		if($m < 3 || $m ==12) {
			return "Winter";
		}
		elseif ($m < 6) {
			return "Spring";
		}
		else {
			return "Fall";
		}
	}
	
	function getHTMLDateFormat($dateObject) {
		$dat = $dateObject->format("Y-m-d") . "T";
		$dat = $dat . $dateObject->format("H:i:s"); 
		return $dat;
	}
	
	function getSQLDateFormat($dateObject) {
		return $dateObject->format("Y-m-d H:i:s");
	}
	
	function getThumbnailDateFormat($dateObject) {
		return $dateObject->format("M d");
	}
	
	function isAfterToday($dateObject) {
		$now = new DateTime();
		$now->add(new DateInterval('P1D'));
		return $dateObject > $now;
	}
	
	function getCurrentDateString() {
		return date("D M d, Y G:i");
	}
	
	function getSeasonString($year) {
		$year2 = $year + 1;
		return $year . "-" . $year2;
	}

?>