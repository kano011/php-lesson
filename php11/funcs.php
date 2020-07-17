<?php
//XSS
function h($str){
  return htmlspecialchars($str, ENT_QUOTES);
}

//SESSION check
function chkSsid(){
  if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    exit("Login Error");
  }else{
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
  }
}

//redirect function
function redirect($filename){
  header("Location: ".$filename);
}

//DB connection
function db_conn(){
  try {
    $pdo = new PDO('mysql:dbname=mydb;charset=utf8;host=localhost','root','root');
    return $pdo;
  } catch  (PDOException $e) {
    exit('DBError:'.$e->getMessage());
  }
}

//SQLerror
function sql_error($stmt){
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}





