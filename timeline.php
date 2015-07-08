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
	<p><input name="userName" type="hidden"  value=<?php echo $userName?>></p><!--userNamer値を渡す-->
	<p id="post_area"><input name="content" type="text" rows="8" cols="40"></textarea></p>
	<p id="post_button"><input name="submit" type="submit" value="ささやく"></p>
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