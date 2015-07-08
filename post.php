<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>cassaやく</title>
<link rel="stylesheet" href="#">
</head>
<body>


<?php
	require(dirname(__FILE__).'/lib/autoload.php');
    use phpcassa\ColumnFamily;
    use phpcassa\ColumnSlice;
    use phpcassa\Connection\ConnectionPool;

		//接続を確立
		$servers = array('localhost:9160');
		$pool = new ConnectionPool('Standard1', $servers); //Keyspace
		$user = new ColumnFamily($pool, 'user'); //ColumnFamily

		//データを書き込み
		$error = $title = $content = ''; 
		$userName = $_POST['userName']; //Row
		if (@$_POST['submit']) {
			$content = $_POST['content']; //Value
			if (!$content) $error .= '本文がありません。<br>';
	
			//エラーがない場合はcassandraへデータを送信
		    if (!$error) {
    			$user->insert($userName,
					array(
                		time() => $content 
     				)
        		);
        	}
		}

		$pool->close();
?>

<!--ユーザーネームをタイムラインに戻す-->
<form name="namePost" method="post" action="timeline.php">
<p><input name="userName" type="hidden"  value=<?php echo $userName?>></p>
<SCRIPT language="JavaScript">document.namePost.submit();</SCRIPT>
</form>


</body></html>