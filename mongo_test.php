<?php
// mongo Instance
$mongo = new Mongo();
// select DB and Collection
$db = $mongo->selectDB("cassa-yaku");
$coll = $db->selectCollection("user-Tweets");

// [[[[write section]]]]

$content = "今日も暑いですね";
$coll->update(
    array(
    	'user_name' => 'eibu',
    	'timestamp' => time(),
    	'content' => $content
    ), 
    array('upsert' => true) 
);

$content = "暑い！耐えられん！";
$coll->update(
    array(
    	'user_name' => 'eibu',
    	'timestamp' => time(),
    	'content' => $content
    	)
    array('upsert' => true) 
);


// [[[[read section]]]]
// read all Oject
$docs = $coll->find();

// [print section] 
foreach ($docs as $obj) {
    print var_dump($obj);
    print ("\n");
}
?>
