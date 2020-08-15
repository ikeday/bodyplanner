<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link rel="stylesheet" type="text/css" href="./css/table.css" />
<title>Body Planner Daily Table</title>
<link rev="made" href="mailto:ikeday819@gmail.com" />
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<canvas id="myChart" style="width: 100%; height:300px;"></canvas>
<script type="text/javascript">
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // 作成したいチャートのタイプ
    type: 'line',

    // データセットのデータ
    data: {
        labels: ["1月", "2月", "3月", "4月", "5月", "6月", "7月"],
        datasets: [{
            label: "初めてのデータセット",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    },

    // ここに設定オプションを書きます
    options: {}
});
</script>
<?php



?>