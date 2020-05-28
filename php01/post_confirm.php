<?php
function h($value){
  return htmlspecialchars($value, ENT_QUOTES);
}
$name = $_POST["name"];
$mail = $_POST["mail"];

$file = fopen("data/name_mail.txt","a");	// ファイル読み込み
fwrite($file, $name.",".$mail."\n");
fclose($file);
?>
<html>
<head>
<meta charset="utf-8">
<title>POST（確認）</title>
</head>
<body>
<form action="post_write.php" method="post">
お名前：<?php echo h($name); ?><br>
Mail：<?php echo h($mail); ?>
<?php
  if($flg == 0){
?>
<input type="submit" value="送信">
<?php
  }
?>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>