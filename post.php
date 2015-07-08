<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>cassaやく</title>
<link rel="stylesheet" href="#">
</head>
<body>


<?php
	$userName = $_POST['userName'];
	$content = $_POST['content'];
	var_dump($content);

	$content = "テスト";
	var_dump($content);
	
	// mongo Instance
	$mongo = new Mongo();
	// select DB and Collection
	$db = $mongo->selectDB("cassa-yaku");
	$coll = $db->selectCollection("user-Tweets");

	$coll->update(
		array('tweet_ID' => test),
    	$postData = array('$set' => array(
    		'user_name' => $userName,
    		'timestamp' => time(),
    		'content' => $content
    		)
   	 	), 
    	array('upsert' => true) 
	);

	echo var_dump($postData);
?>

<!--ユーザーネームをタイムラインに戻す-->
<form name="namePost" method="post" action="timeline.php">
<p><input name="userName" type="hidden" value=<?php echo $userName?>></p>
<!--<SCRIPT language="JavaScript">document.namePost.submit();</SCRIPT>-->
</form>


</body></html>