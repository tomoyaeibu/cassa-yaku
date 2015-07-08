<?php
// mongo Instance
$mongo = new Mongo();
// select DB and Collection
$db = $mongo->selectDB("cassa-yaku");
$coll = $db->selectCollection("user-Tweets");

// [[[[write section]]]]

$content = "今日も暑いですね 7/1";
$coll->update(
	array('tweet_ID' => '001'),
    array('$set' => array(
    	'user_name' => 'eibu',
    	'timestamp' => time(),
    	'content' => $content
    	)
    ), 
    array('upsert' => true) 
);

$content = "暑い！耐えられん！ 7/3";
$coll->update(
	array('tweet_ID' => '002'),
    array('$set' => array(
    	'user_name' => 'eibu',
    	'timestamp' => time()+30,
    	'content' => $content
    	)
    ), 
    array('upsert' => true) 
);

$content = "ちょうどいい気温♪ 7/2";
$coll->update(
	array('tweet_ID' => '003'),
    array('$set' => array(
    	'user_name' => 'eibu',
    	'timestamp' => time()+10,
    	'content' => $content
    	)
    ), 
    array('upsert' => true) 
);

$content = "私は別の人です";
$coll->update(
	array('tweet_ID' => '004'),
    array('$set' => array(
    	'user_name' => 'Abe',
    	'timestamp' => time()+10,
    	'content' => $content
    	)
    ), 
    array('upsert' => true) 
);



// [[[[read section]]]]
// read all Oject
$docs = $coll->find();
// sort by "timestamp"
$docs -> sort(array('timestamp' => 1));

// [print section] 
foreach ($docs as $obj) {
    print var_dump($obj);
    print ("\n");
}
?>
