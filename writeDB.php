<?php

// MySQLへ引き渡すデータ
$url = "localhost";
$user = "root";
$pass = "skapara1925";
$db = "bodyplanner";
$pdomsg = 'mysql:host=' . $url . ';dbname=' . $db . ';charset=utf8';

global $ret_msg;
$ret_msg = "Write data successful.";

$sql = $_POST["sqlquery"];

try {
    $pdo = new PDO($pdomsg, $user, $pass);
} catch (PDOException $e) {
    $ret_msg= "Connection error: ".$e->getMessage();
}


try {
    $statement = $pdo->query($sql);
    $errorCode = $pdo->errorInfo();
    if($errorCode[0] != "00000"){
    	$ret_msg = "WriteDB error: " . $errorCode[2];
    	throw new PDOException($errorCode[2]);
    }
} catch (PDOException $e) {
    $ret_msg= "Written error: ".$e->getMessage();
    //die();
}



// ③ヘッダーの設定
header('Content-type:application/json; charset=utf8');
// ④JSON形式にして返却
echo json_encode($ret_msg);

?>
