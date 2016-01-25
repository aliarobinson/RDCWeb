<?php
	function getShowInfo($id) {
		$info = "";
		if($id == 1) {
			
			$performances = ['2016-1-29 19:30','2016-1-30 19:30','2016-1-31 14:30','2016-2-05 19:30','2016-2-06 19:30'];
			$directors = array('Director' => 'Terence Hartnett');
			$actors = array('Kate' => 'Monya Wolf', 'Maggie' => 'Alia Robinson', 'Agnes' => 'Sarah Eberhardt', 'Rose' => 'Rachel Weber', 'Christina' => 'Lauren Wiseman', 'Michael' => 'Scott Blankenbaker', 'Father Jack' => 'Curtis Humm', 'Gerry' => 'Quinn Cunningham');
			$crew = array('Stage Manager' => 'Brandi Stockton-Fresso');
			
			$info = array('title' => 'Dancing At Lughnasa', 'subtitle' => '', 'synopsis' => 'It is 1936 and harvest time in County Donegal. In a house just outside the village of Ballybeg live the five Mundy sisters, barely making ends meet, their ages ranging from twenty-six up to forty. The two male members of the household are brother Jack, a missionary priest, repatriated from Africa by his superiors after twenty-five years, and the seven-year-old child of the youngest sister. In depicting two days in the life of this menage, Brian Friel evokes not simply the interior landscape of a group of human beings trapped in their domestic situation, but the wider landscape, interior and exterior, Christian and pagan, of which they are nonetheless a part.',
				'thumbnail' => 'dalthumb.jpg', 'banner' => 'dalbanner.jpg', 'performances' => $performances, 'directors' => $directors, 'actors' => $actors, 'crew' => $crew );
		}
		elseif($id == 2) {
			$performances = ['2015-10-30 19:30','2015-10-31 19:30','2015-11-01 14:30','2015-11-06 19:30','2015-11-07 19:30'];
			
			$info = array('title' => 'Much Ado About Nothing', 'subtitle' => '', 'synopsis' => 'Considered one of Shakespeare’s best comedies contrasting two pairs of lovers in a witty and suspenseful battle of the sexes. Attracted to each other, the maddeningly skeptical Beatrice and Benedick are dead-locked in a lively war of words until their friends hatch a plot to unite them. The mutually devoted Hero and Claudio, on the other hand, all too quickly fall victim to a malicious plot to part them. Near-fatal complications ensue, but with the help of the hilarious Constable Dogberry and his confederates, the lovers are ultimately united.',
				'thumbnail' => 'maanthumb.jpg', 'banner' => 'muchado5.jpg', 'performances' => $performances );
		
		}
		elseif($id == 3) {
			$performances = ['2016-4-22 19:30','2016-4-23 19:30','2016-4-24 14:30','2016-4-29 19:30','2016-4-30 19:30'];
			
			$info = array('title' => 'West Side Story', 'subtitle' => '', 'synopsis' => 'A love affair is fated for tragedy amidst the vicious rivalry of two street gangs the Jets and the Sharks. When Jets member Tony falls for Maria, the sister of the Sharks leader, it’s more than these two warring gangs can handle. And as mounting tensions rise, a battle to the death ensues, and innocent blood is shed in a heartbreaking finale.',
				'thumbnail' => 'wssthumb.jpg', 'banner' => 'westsidestory.jpg', 'performances' => $performances );
		
		}
		
		return json_encode($info);
		
		
	}

?>