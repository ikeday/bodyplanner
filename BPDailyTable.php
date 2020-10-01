<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link rel="stylesheet" type="text/css" href="./css/ScrollTable.css" />
<title>Body Planner Daily Table</title>
<link rev="made" href="mailto:ikeday819@gmail.com" />
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php
require_once './utilities.php';

$pdo = db_connect();    //  DB(bodyplanner)へ接続

// 全データの取得
$sql = "select * from dailydata";
$statement = $pdo->query($sql);
$BPdailydata = ($statement->fetchAll(PDO::FETCH_ASSOC)); // 全データ
$num_dailydata = $statement->rowCount(); // データ数
$statement->closeCursor();
$column_width = 95;
$date_width = 170;

$tableWidth = $num_dailydata * $column_width + $date_width;
$frameWidth = $tableWidth + 20;
?>
<script>
$('#dataCell', window.top.document).width(<?php echo "'" . $tableWidth . "px'"?>);
//$('#dataFrame', window.top.document).width(<?php echo "'" . $frameWidth . "px'"?>);
$('#dataFrame', window.top.document).width(<?php echo "'" . 2000 . "px'"?>);
</script>
<?php
print('<table width="' . $tableWidth . '" height="800">');
// print('<table>');
// 日付
print('<tr>');
print('<th class="fixed01" width="'. $date_width .'">項目／日付</th>');
for ($i = 0; $i < $num_dailydata; $i ++) {
    $dateData = strtotime($BPdailydata[$i]['date']);
    print('<td align="center">' . date('m/d', $dateData) . '</td>');
}
print('</tr>');
// その他
for ($j = 0; $j < count($entry_jp); $j ++) {
	// assign background color
	if ($j % 2 == 0) {
		$bgc = '#C0C0C0';
	} else {
		$bgc = '#FFFFFF';
	}
	
    print('<tr bgcolor="' . $bgc . '">');
    print('<th class="fixed01" align="left" width=' . $column_width . '>' . $entry_jp[$j] . '</th>');

    if(($j==8)||($j==16)||($j==17)) $fmt = "%d";
    else $fmt = "%.2f\n";

    for ($i = 0; $i < $num_dailydata; $i ++) {
        $num = sprintf($fmt, $BPdailydata[$i][$entry_sql[$j]]);
        print('<td align="center">' . $num . '</td>');
    }
    print('</tr>');
}

print('</table>');

?>

</body>
</html>