<?php
	// mongo Instance
	$mongo = new Mongo();
	// select DB and Collection
	$db = $mongo->selectDB("cassa-yaku");
	$coll = $db->selectCollection("user-Tweets");

	// read all Oject
	$docs = $coll->find();
	// sort by "timestamp"
	$docs -> sort(array('timestamp' => 1));
	
?>