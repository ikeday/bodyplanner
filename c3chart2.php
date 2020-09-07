<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>C3.js で２本折れ線グラフを描画する</title>
<link href="../c3/c3.css" rel="stylesheet"><!-- c3.css を読み込む -->
</head>
<body>
<h2  style="width: 1980px; height: 30px"><center><div  id="chart_header"></div></center></h2>
<div id="my-container" style="width: 1980px; height: 900px; border: solid 1px red">
  <div id="my-chart"></div>
</div>
<script>
$('#dataCell', window.top.document).width('2000px');
$('#dataFrame', window.top.document).width('1990px');
</script>
<?php
require_once './utilities.php';
$num_data_entry = (int) $_GET['data_entry'];

// 2. DB接続します
$pdo = db_connect();

// 2．データ登録SQL作成
// prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
$stmt = $pdo->prepare("SELECT* FROM dailydata");
$status = $stmt->execute();

$dailydata = array();
// loop through the returned data
while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $_right = $r[$entry_sql[$num_data_entry]];
    $_left = $r[$entry_sql[$num_data_entry + 1]];

    $workArr = array('date' => $r['date'],
        $entry_sql[$num_data_entry] => $_right,
        $entry_sql[$num_data_entry + 1] => $_left,
        'average'=> ($_right + $_left) / 2.0
    );
    array_push($dailydata, $workArr);
}

$data_json = json_encode($dailydata);
//console_log($data_json);
?>

<script src="https://d3js.org/d3.v5.min.js"></script><!-- D3.js を読み込む -->
<script src="../c3/c3.min.js"></script><!-- C3.js を読み込む -->
<script>
var h1_title = document.getElementById('chart_header');
h1_title.innerHTML = <?php echo "'". $data_entry_jp[$num_data_entry]."'"  ?>;
//var c3data = JSON.stringify();
let chart = c3.generate({
  bindto: '#my-chart',
  size: { width: 1980, height: 890 }, // グラフ描画領域のサイズ
  data: {
    json: <?php echo $data_json ?>,
	x: 'date',
    keys:{
        value: ['date',
            <?php echo "'".$entry_sql[$num_data_entry]."'" ?>,
            <?php echo "'".$entry_sql[$num_data_entry + 1]."'" ?>,
            'average'
        ],
    }
  },
  labels: true, // それぞれの点に数値を表示
  axis: {
    x: {
      type: 'timeseries',
      label: {
        text: '日付',
        position: 'outer-middle'
      }
    },
    y: {
      label: {
        text: <?php echo "'".$entry_jp[$num_data_entry]."'" ?>,
        position: 'outer-middle'
      }
    }
  }
});
</script>

</body>
</html>