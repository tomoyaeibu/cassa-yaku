<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>cassaやく</title>
<link rel="stylesheet" href="reset.css">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="content">
<br>
<?php $userName = $_POST['userName'] ?>

<!-- //tweet form-->
<form method="post" action="post.php"><div class="post">
	<input name="userName" type="hidden"  value=<?php echo $userName?>><!--userNamer値を渡す-->
	<textarea name="content" type="text" style="width:200px;height:50px;"></textarea>
	<input name="submit" type="submit" value="ささやく">
</div></form>

<!-- //get tweets -->
<?php require 'get.php'; ?>

<!-- // print tweets -->
<div id="tweets_area">
<?php foreach ($tweetList as $tweet){ ?>
	<div class="posts">
		<img src="images/icon1.jpg" class="icon" width=50 height50>
		<p><?php echo $tweet['content']; ?></p>
	</div>
<?php } ?>
</div>

<br>
<br>
</div>

</body>
</html>