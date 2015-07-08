<?php
	// mongo Instance
	$mongo = new Mongo();
	// select DB and Collection
	$db = $mongo->selectDB("cassa-yaku");
	$coll = $db->selectCollection("user-Tweets");

	// read all Oject
	$tweetList = $coll->find();
	// sort by "timestamp"
	$tweetList -> sort(array('timestamp' => 1));

?>