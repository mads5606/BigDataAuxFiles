<!DOCTYPE HTML>
<html>
<head></head>
<body>
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

    try {

        $socket = new Thrift\Transport\TSocket('0.0.0.0', 9090);
        $socket->setSendTimeout(10000);
        $socket->setRecvTimeout(20000);
        $transport = new Thrift\Transport\TBufferedTransport($socket);
        $protocol = new Thrift\Protocol\TBinaryProtocol($transport);
        $client = new THBaseServiceClient($protocol);
        $transport->open();
        $scan = new TScan(array('startRow' => '1', 'stopRow' => '7'));
        $scanid = $client->openScanner('country_table',$scan);
        $result = $client->getScannerRows($scanid, 7);
        //$scanRets = $client->getScannerRows($scan, $num);
        foreach($result as $value){
            echo(",[".$value->columnValues[1]->value."',".$value->columnValues[0]->value."]");
            $i = $i+1;
          }
        $client->closeScanner($scanid);
        echo("<br/><br/>");
        //$transport->close();
        echo("Connection done !");
        
    } catch (IOError $ex) {
        echo $ex->message;
    }
?>
</body>  


