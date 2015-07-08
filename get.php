<?php
	require(dirname(__FILE__).'/lib/autoload.php');
    use phpcassa\ColumnFamily;
    use phpcassa\ColumnSlice;
    use phpcassa\Connection\ConnectionPool;
    error_reporting(0);

	try{
		//接続を確立
		$servers = array('localhost:9160');
		$pool = new ConnectionPool('Standard1', $servers);

		//読み込み
		$user = new ColumnFamily($pool, 'user');
		$result = $user->get($userName);

		//記事を時間順に逆転
		$posts = array_reverse($result);    
		
		$pool->close();
		
	}catch(Exception $e){
       //echo 'ERROR : ' . print_r($e, true);
    }
?>