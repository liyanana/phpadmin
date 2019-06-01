<?php
include "dist/db.php";
$sql="SELECT DATE_FORMAT(createdAt, '%Y%m%d') days, count(id) count FROM (SELECT * FROM orders WHERE DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(createdAt)) AS a GROUP BY days;";
$r=$db->query($sql);
$data=$r->fetch_all(MYSQLI_ASSOC);//获取数据集

function get_week($time = '', $format='Y-m-d'){
  $time = $time != '' ? $time : time();
  //获取当前周几
  $week = date('w', $time);
  $date = [];
  for ($i=1; $i<=7; $i++){
      $date[$i] = date($format ,strtotime( '-' . $i-$week .' days', $time));
  }
  return $date;
};
$arr=get_week();
var_dump($arr);
?>
<!DOCTYPE html>
<html>
  <header>
    <meta charset="utf-8" />
    <!-- 引入 ECharts 文件 -->
  </header>
  <body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="width: 600px;height:400px;"></div>
    <script src="static/js/echarts.min.js"></script>

    <script type="text/javascript">
      // 基于准备好的dom，初始化echarts实例
      var myChart = echarts.init(document.getElementById("main"));

      // 指定图表的配置项和数据
      var option = {
        title: { text: "近7日订单趋势图" },
        xAxis: {
          type: "category",
          data:<?php echo $arr?>
        },
        yAxis: {
          type: "value"
        },
        series: [
          {
            data:[1],
            type: "line"
          }
        ]
      };

      // 使用刚指定的配置项和数据显示图表。
      myChart.setOption(option);
    </script>
  </body>
</html>
