<?php 
    define('THRIFT_PATH', __DIR__);

    require_once THRIFT_PATH . '/Thrift/ClassLoader/ThriftClassLoader.php';
    
    $classLoader = new Thrift\ClassLoader\ThriftClassLoader();
    $classLoader->registerNamespace('Thrift', THRIFT_PATH);
    $classLoader->register();

    require_once("./gen-php/THBaseServiceIf.php");
    require_once("./gen-php/THBaseService_createNamespace_args.php");
    require_once("./gen-php/TIOError.php");
    require_once("./gen-php/THBaseService_createNamespace_result.php");
    require_once("./gen-php/THBaseService_deleteNamespace_args.php");
    require_once("./gen-php/THBaseService_deleteNamespace_result.php");
    require_once("./gen-php/THBaseServiceClient.php");
    require_once("./gen-php/TNamespaceDescriptor.php");
    require_once("./gen-php/TTableName.php");
    require_once("./gen-php/TTableDescriptor.php");
    require_once("./gen-php/TColumnFamilyDescriptor.php");
    require_once("./gen-php/THBaseService_createTable_result.php");
    require_once("./gen-php/THBaseService_deleteTable_result.php");
    require_once("./gen-php/THBaseService_createTable_args.php");
    require_once("./gen-php/THBaseService_deleteTable_args.php");
    require_once("./gen-php/THBaseService_disableTable_args.php");
    require_once("./gen-php/THBaseService_disableTable_result.php");
    require_once("./gen-php/THBaseService_get_args.php");
    require_once("./gen-php/THBaseService_get_result.php");
    require_once("./gen-php/THBaseService_put_args.php");
    require_once("./gen-php/THBaseService_put_result.php");
    require_once("./gen-php/THBaseService_putMultiple_args.php");
    require_once("./gen-php/THBaseService_putMultiple_result.php");
    require_once("./gen-php/THBaseService_getMultiple_args.php");
    require_once("./gen-php/THBaseService_getMultiple_result.php");
    require_once("./gen-php/THBaseService_getScannerResults_args.php");
    require_once("./gen-php/THBaseService_getScannerResults_result.php");
    require_once("./gen-php/THBaseService_getScannerRows_args.php");
    require_once("./gen-php/THBaseService_getScannerRows_result.php");
    require_once("./gen-php/THBaseService_openScanner_args.php");
    require_once("./gen-php/THBaseService_openScanner_result.php");
    require_once("./gen-php/THBaseService_closeScanner_args.php");
    require_once("./gen-php/THBaseService_closeScanner_result.php");
    require_once("./gen-php/TResult.php");
    require_once("./gen-php/TPut.php");
    require_once("./gen-php/TGet.php");
    require_once("./gen-php/TColumnValue.php");
    require_once("./gen-php/TScan.php"); 
    
    $socket = new Thrift\Transport\TSocket('0.0.0.0', 9090);
    $socket->setSendTimeout(10000);
    $socket->setRecvTimeout(20000);
    $transport = new Thrift\Transport\TBufferedTransport($socket);
    $protocol = new Thrift\Protocol\TBinaryProtocol($transport);
    $client = new THBaseServiceClient($protocol);
    $transport->open();
    ?>

<!DOCTYPE HTML>
<html>
<head>  
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
  <div class="row" style="margin-top:200px">
    <div class="col-sm " style="margin-right : 20px">
    <canvas id="myChart"></canvas>
    </div>
    <div class="col-sm " style="margin-left : 20px">
    <div  id="regions_div"></div>
    </div>
  </div>
  <div class="row">
  <div class="col-sm ">
  <canvas id="myChart1"></canvas>
  </div>
  <div class="col-sm "></div>
  </div>
</div>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
        labels: [<?php 
          $scan = new TScan(array('startRow' => '1', 'stopRow' => '7'));
          $scanid = $client->openScanner('date_table',$scan);
          $result = $client->getScannerRows($scanid, 7);
          //$scanRets = $client->getScannerRows($scan, $num);
          $a = [];
          foreach($result as $value){
              $a[] = $value->columnValues[1]->value;
          }
          $sortedArray = array_unique($a);
          sort($sortedArray);
          $client->closeScanner($scanid);
          for($i = 0; $i < sizeof($sortedArray);$i++)
          {
              if ($i != 0){
                  echo(",");
              }
              echo("'".$sortedArray[$i]."'");
          }
          
          ?>],
        datasets: [{
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [<?php 
              $scan = new TScan(array('startRow' => '1', 'stopRow' => '7'));
              $scanid = $client->openScanner('date_table',$scan);
              $result = $client->getScannerRows($scanid, 7);
              //$scanRets = $client->getScannerRows($scan, $num);
              $countDate = [];
              foreach($result as $value){
                  if(!array_key_exists($value->columnValues[1]->value,$countDate));
                  $countDate[$value->columnValues[1]->value][] = $value->columnValues[0]->value;
                }
              $final = [];
              foreach(array_keys($countDate) as $key){
                  $final[$key] = array_sum($countDate[$key]);
              }
              ksort($final);
              echo implode(",", $final);
              $client->closeScanner($scanid);
            ?>]
        }]
    },

    // Configuration options go here
    options: {
        title: {
            display: true,
            text: 'Tweets over time'
        },
        legend: {
            display: false
        }
    }
});

</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyCbyM_ViHW9X0aIl6XFls5uUauqZkWe2GQ'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);
      
      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Tweets']
          <?php 
          $scan = new TScan(array('startRow' => '1', 'stopRow' => '7'));
          $scanid = $client->openScanner('country_table',$scan);
          $result = $client->getScannerRows($scanid, 7);
          //$scanRets = $client->getScannerRows($scan, $num);
          foreach($result as $value){
              echo(",['".$value->columnValues[1]->value."',".$value->columnValues[0]->value."]");
              $i = $i+1;
            }
          $client->closeScanner($scanid);
          ?>
        ]);
        console.log("called")
        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
      </script>
      <script>
      var ctx = document.getElementById('myChart1').getContext('2d');
      var myBarChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels:["Positive","Neutral","Negative"],
            datasets: [{
              data: [51, 32, 27],
              backgroundColor : ["rgba(75,192,192,0.2)","rgba(201,203,207,0.2)","rgba(255,99,132,0.2)"],
              borderColor : ["rgba(75,192,192)","rgba(201,203,207)","rgba(255,99,132)"],
              borderWidth:1
          }]
          },
          options: {
            title: {
                display: true,
                text: 'Sentiment Analysis regarding vaccine'
            },
            legend: {
                display: false
            },scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
      });
      </script>
</body>
</html>