<?php
	// mongo Instance
	$mongo = new Mongo();
	// select DB and Collection
	$db = $mongo->selectDB("cassa-yaku");
	$coll = $db->selectCollection("user-Tweets");

	// read all Oject
	$userQuery = array('user_name' => $userName);
	if(stristr($userName,'nozokimi')){
		$tweetList = $coll->find();
	}else{
		$tweetList = $coll->find($userQuery);
	}
	// sort by "timestamp"
	$tweetList -> sort(array('timestamp' => -1));

?>