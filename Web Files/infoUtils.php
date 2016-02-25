<?php

	function printAllMembersDatalist() {
		$allMembers = getAllMembers();
		printMemberDatalist($allMembers);
	}
	
	function printMemberDatalist($memberArray) {
		echo("<datalist id='memberList'>");
		foreach($memberArray as $mem) {
			echo("<option value='");
			echo($mem['Name']);
			echo("'></option>");
		}
		echo("</datalist>");
	}
?>