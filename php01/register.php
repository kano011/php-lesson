<html>
<head>
<meta charset="utf-8">
<title>登録内容</title>
<style>
table{padding: 2rem;}
td{width: 100px;}
</style>
</head>
<body>

<?php
$file = fopen("data/name_mail.txt","r");
if($file){
  while ($line = fgets($file)) {
    $names[] = preg_split("/,/", $line);
  }
}
fclose($file);
// var_dump($names);
?>
<table>
<tr><td>名前</td><td>メール</td></tr>
<?php
foreach($names as list($name, $mail)){
  echo "<tr><td>$name</td><td>$mail</td></tr>";
}
?>
</table>


<ul>
<li><a href="post.php">書き込む</a></li>
<li><a href="index.php">戻る</a></li>
</ul>
</body>
</html>