<?php

// MySQLへ引き渡すデータ
$url = "localhost";
$user = "ikeday";
$pass = "Skapara1925+";
$db = "bodyplanner";
$pdomsg = 'mysql:host=' . $url . ';dbname=' . $db . ';charset=utf8';

global $ret_msg;
$ret_msg = "Write data successful.";

$sql = $_POST["sqlquery"];

try {
    $pdo = new PDO($pdomsg, $user, $pass);
} catch (PDOException $e) {
    $ret_msg= "Connection error: ".$e->getMessage();
    die();
}


try {
    $statement = $pdo->query($sql);
} catch (PDOException $e) {
    $ret_msg= "Written error: ".$e->getMessage();
    die();
}



// ③ヘッダーの設定
header('Content-type:application/json; charset=utf8');
// ④JSON形式にして返却
echo json_encode($ret_msg);

?>
