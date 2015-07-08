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
	
	// mongo Instance
	$mongo = new Mongo();
	// select DB and Collection
	$db = $mongo->selectDB("cassa-yaku");
	$coll = $db->selectCollection("user-Tweets");

	$coll->update(
		array('tweet_ID' => time()),
    	$postData = array(
    		'user_name' => $userName,
    		'timestamp' => time(),
    		'content' => $content
   	 	), 
    	array('upsert' => true) 
	);

?>

<!--ユーザーネームをタイムラインに戻す-->
<form name="namePost" method="post" action="timeline.php">
<input name="userName" type="hidden" value=<?php echo $userName?>>
<SCRIPT language="JavaScript">document.namePost.submit();</SCRIPT>
</form>


</body></html>