<?php
	// mongo Instance
	$mongo = new Mongo();
	// select DB and Collection
	$db = $mongo->selectDB("cassa-yaku");
	$coll = $db->selectCollection("user-Tweets");

	// read all Oject
	$docss = $coll->find();
	// sort by "timestamp"
	$docss -> sort(array('timestamp' => 1));

?>