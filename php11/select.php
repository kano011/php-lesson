<?php
session_start();
include("funcs.php");
$pdo = db_conn();
chkSsid();

$sql = "SELECT * FROM hw01_table ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();


$view="";
if($status==false) {
  sql_error($stmt);
}else{
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
    $view .= $res["name"];
    $view .= '<a href="delete.php?id='.$res["id"].'">';
    $view .= '[削除]';
    $view .= '</a>';
    $view .= '</p>';
  }
}
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>アンケート：一覧表示画面</title>
</head>
<body>
<a href="logout.php">ログアウト</a>
<?php
  //表示用変数
  echo $view;
?>
</body>
</html>
