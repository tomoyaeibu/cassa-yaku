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


<!-- //tweet form-->
<?php $userName = $_POST['userName'] ?>
<form method="post" action="post.php"><div class="post">
	<p><input name="userName" type="hidden"  value=<?php echo $userName?>></p>
	<p id="post_area"><textarea name="content" rows="8" cols="40"><?php echo $content ?></textarea></p>
	<p id="post_button"><input name="submit" type="submit" value="ささやく"></p>
</div></form>

<!-- //get tweets -->
<?php require 'get.php'; ?>

<!-- //print tweets -->
<div id="tweets_area">
<?php foreach ($tweetList as $tweet){ ?>
	<div class="posts">
		<img src="images/icon1.jpg" class="icon" width=50 height50>
		<p><?php echo var_dump($tweet);?></p>
	</div>
<?php } ?>
</div>

<br>
<br>
</div>

</body>
</html>