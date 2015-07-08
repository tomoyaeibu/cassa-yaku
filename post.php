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
	echo $userName;
?>

<!--ユーザーネームをタイムラインに戻す-->
<form name="namePost" method="post" action="timeline.php">
<p><input name="userName" type="hidden"  value=<?php echo $userName?>></p>
<!-- <SCRIPT language="JavaScript">document.namePost.submit();</SCRIPT>-->
</form>


</body></html>