<?php 
use yii\helpers\Json;
?>

<script src="../../vendor/bower-asset/echarts/dist/echarts-en.min.js"></script>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="width: 600px;height:400px;"></div>
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
        var option = {
        	    title : {
        	        text: 'Benutzer Anzahl',
        	    },
        	    tooltip : {
        	    },
        	    legend: {
        	        data:['最高气温','最低气温']
        	    },
        	    toolbox: {
        	        show : true,
        	        feature : {
        	            mark : {show: true},
        	            dataView : {show: true, readOnly: false},
        	            magicType : {show: true, type: ['line', 'bar']},
        	            restore : {show: true},
        	            saveAsImage : {show: true}
        	        }
        	    },
        	    calculable : true,
        	    xAxis : [
        	        {
        	            type : 'category',
        	            boundaryGap : false,
        	            data : ['周一','周二','周三','周四','周五','周六','周日']
        	        }
        	    ],
        	    yAxis : [
        	        {
        	            type : 'value',
        	            axisLabel : {
        	                formatter: '{value} °C'
        	            }
        	        }
        	    ],
        	    series : [
        	        {
        	            name:'最高气温',
        	            type:'line',
        	            data:[11, 11, 15, 13, 12, 13, 10],
        	            markPoint : {
        	                data : [
        	                    {type : 'max', name: '最大值'},
        	                    {type : 'min', name: '最小值'}
        	                ]
        	            },
        	            markLine : {
        	                data : [
        	                    {type : 'average', name: '平均值'}
        	                ]
        	            }
        	        },
        	    ]
        	};

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
</script>
<?php 
$row = (new \yii\db\Query())
->select(['id','Datum','Anzahlen'])
->from('anzahl_des_benutzers')
->all();

$ret = array_values($row);
echo JSON::encode($ret);
?>