<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>cassaやく</title>
<link rel="stylesheet" href="#">
</head>
<body>
<form method="post" action="timeline.php">
  <div class="post">
    <p>ユーザーネーム</p>
    <p><textarea name="userName" rows="1" cols="40"></textarea></p>
    <p>パスワード</p>
    <p><textarea name="password" rows="1" cols="40"></textarea></p>
    <p><input name="submit" type="submit" value="ログイン"></p>
    <p><?php echo $error ?></p>
  </div>
</form>
</body>
</html>