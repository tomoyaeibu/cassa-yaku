<?php
// mongo Instance
$mongo = new Mongo();
// select DB and Collection
$db = $mongo->selectDB("cassa-yaku");
$coll = $db->selectCollection("user-Tweets");

// [[[[write section]]]]

$content = "今日も暑いですね";
$coll->update(
    array('$set' => array('user_name' => 'eibu')), 
    array('$set' => array('timestamp' => time())), 
    array('$set' => array('content' => $content)), 
    array('upsert' => true) 
);

$content = "暑い！耐えられん！";
$coll->update(
    array('$set' => array('user_name' => 'eibu')), 
    array('$set' => array('timestamp' => time())), 
    array('$set' => array('content' => $content)), 
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
