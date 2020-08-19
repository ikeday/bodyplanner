<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>usage: localhost//bodyplanner/chart.php?data_entry=0</title>
</head>
<body>
<?php
require_once './utilities.php';
$num_data_entry = (int) $_GET['data_entry'];
//if(!$num_data_entry) $num_data_entry = 1;

// 2. DB接続します
$pdo = db_connect();

$x_axe = '';
$y_axe1 = '';       //      １本目のグラフ
$y_axe2 = '';       //      ２本目のグラフ

// 2．データ登録SQL作成
// prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
$stmt = $pdo->prepare("SELECT* FROM dailydata");
$status = $stmt->execute();

// loop through the returned data
while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {

//     $x_axe = $x_axe . '"' . $r['date'] . '",';
    $x_axe = $x_axe . '"' . $r['date'] . '",';
//    $y_axe1 = $y_axe1 . '"' . $r[$entry_sql[$num_data_entry]] . '",';
    $y_axe1 = $y_axe1 . '"' . $r[$entry_sql[$num_data_entry]] . '",';
    $y_axe2 = $y_axe2 . '"' . $r[$entry_sql[$num_data_entry+1]] . '",';
}

$x_axe = trim($x_axe, ",");
$y_axe1 = trim($y_axe1, ",");
$y_axe2 = trim($y_axe2, ",");
$y_label1 = $entry_jp[$num_data_entry];
$y_label2 = $entry_jp[$num_data_entry+1];

?>
    <canvas id="myChart"></canvas>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
	<script>
	var timeFormat = 'YYYY-MM-DD';
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php echo $x_axe ?>],
            datasets: [{
                label: ['<?php  echo $y_label1  ?>'],
 //                label: ['体重'],
                data: [<?php echo $y_axe1 ?>],
                borderWidth: 1,
                borderColor: "rgba(255,0,0,1)",
                backgroundColor: "rgba(255,0,0,0.2)"
            },{
            	label: ['<?php  echo $y_label2  ?>'],
            //                label: ['体重'],
                data: [<?php echo $y_axe2 ?>],
                borderWidth: 1,
                borderColor: "rgba(0,0,255,1)",
                backgroundColor: "rgba(0,0,255,0.2)"
            }],
        },
        options: {
			title: {
				text: 'Chart.js Time Scale'
			},
			scales: {
				xAxes: [{
					type: 'time',
					time: {
						parser: timeFormat,
						// round: 'day'
						//tooltipFormat: 'MM/DD'
						unit: 'day'
					},
					scaleLabel: {
						display: true,
						labelString: '日付'
					}
				}],
				yAxes: [{
					scaleLabel: {
						display: true,
						labelString:'<?php echo $y_label1 ?>'
//						labelString: '体重'
					},
                	ticks: {
                    	beginAtZero: false
                	}
				}]
			},
		}
    });
    </script>

</body>
</html>