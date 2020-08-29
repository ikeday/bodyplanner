<?php
//共通に使う関数を記述
//DB接続の関数
function db_connect(){
    // MySQLへ引き渡すデータ
    $url = "localhost";
    $user = "root";
    $pass = "skapara1925";
    $db = "bodyplanner";
    $pdomsg = 'mysql:host=' . $url . ';dbname=' . $db . ';charset=utf8';
    try {
        $pdo = new PDO($pdomsg, $user, $pass);
    } catch (PDOException $e) {
        var_dump($e->getMessage());
        die();
    }
    return $pdo;//※重要！！※ ここでリターンすることで他の項目でも使用している変数($pdo)を関数の外でも使用できるようにしている
}

//  console.log実装
function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}
// 配列データ
$entry_jp = array(
    "体重(kg)",
    "BMI",
    "体脂肪率(%)",
    "体脂肪量(kg)",
    "体脂肪率右腕(%)",
    "体脂肪率左腕(%)",
    "体脂肪率右足(%)",
    "体脂肪率左足(%)",
    "内蔵脂肪指数",
    "骨格筋量(kg)",
    "骨格筋量右腕(kg)",
    "骨格筋量左腕(kg)",
    "骨格筋量右足(kg)",
    "骨格筋量左足(kg)",
    "推定骨量(kg)",
    "水分量(kg)",
    "基礎代謝量(kcal)",
    "標準基礎代謝量(kcal)",
);
$data_entry_jp = array(
    "体重(kg)",
    "BMI",
    "体脂肪率(%)",
    "体脂肪量(kg)",
    "体脂肪率腕(%)",
    "体脂肪率腕(%)",
    "体脂肪率足(%)",
    "体脂肪率足(%)",
    "内蔵脂肪指数",
    "骨格筋量(kg)",
    "骨格筋量腕(kg)",
    "骨格筋量腕(kg)",
    "骨格筋量足(kg)",
    "骨格筋量足(kg)",
    "推定骨量(kg)",
    "水分量(kg)",
    "基礎代謝量(kcal)",
    "標準基礎代謝量(kcal)",
);

$entry_sql = array(
    "weight",
    "BMI",
    "fat_ratio",
    "fat_quant",
    "fat_right_arm",
    "fat_left_arm",
    "fat_right_leg",
    "fat_left_leg",
    "inner_fat",
    "muscle",
    "muscle_right_arm",
    "muscle_left_arm",
    "muscle_right_leg",
    "muscle_left_leg",
    "bone",
    "water",
    "metabolism",
    "std_metabolism"
);
?>
<!--
<table width="1200" border="1">
	<tr>
		<th>日付</th>
		<th>体重</th>
		<th>BMI</th>
		<th>体脂肪率</th>
		<th>体脂肪量</th>
		<th>体脂肪率右腕</th>
		<th>体脂肪率左腕</th>
		<th>体脂肪率右足</th>
		<th>体脂肪率左足</th>
		<th>内臓脂肪指数</th>
		<th>骨格筋量</th>
		<th>骨格筋量右腕</th>
		<th>骨格筋量左腕</th>
		<th>骨格筋量右足</th>
		<th>骨格筋量左足</th>
		<th>推定骨量</th>
		<th>水分量</th>
		<th>基礎代謝量</th>
		<th>基礎代謝基準量</th>
		<th>除脂肪量四肢</th>
		<th>SMI</th>
	</tr>
</table>
-->