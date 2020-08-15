<?php
require_once './utilities.php';

//2. DB接続します
$pdo = db_connect();


$x_axe = '';
$y_axe = '';


//2．データ登録SQL作成
//prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
$stmt = $pdo->prepare("SELECT* FROM dailydata");
$status = $stmt->execute();

//loop through the returned data
while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){
    
    $x_axe = $x_axe . '"'. $r['date'].'",';
    $y_axe = $y_axe . '"'. $r['weight'] .'",';
}

$x_axe = trim($x_axe,",");
$y_axe = trim($y_axe,",");
?>