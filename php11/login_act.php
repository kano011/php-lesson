<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

include("funcs.php");
$pdo = db_conn();

$sql = "SELECT * FROM hw01_table WHERE lid = :lid AND lpw = :lpw AND life_flg = 0";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);
$status = $stmt->execute();

if($status==false){
  sql_error($stmt);
}

$val = $stmt->fetch();
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)

//if(password_verify($lpw, $val["lpw"])){ //* Password Hash
if( $val["id"] != "" ){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  redirect("select.php");
}else{
  // redirect("login.php");
  header("Location: login.php");
}

exit();


