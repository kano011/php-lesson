<?php
session_start();
include("funcs.php");
$pdo = db_conn();
chkSsid();

$id = $_GET["id"];

$sql = "DELETE FROM hw01_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id);

$status = $stmt->execute();

if($status==false) {
  sql_error($stmt);
}else{
  redirect("select.php");
  exit();
}

?>
