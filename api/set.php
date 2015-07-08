<?php
	//header('Access-Control-Allow-Origin:*');
	header("Content-Type: text/xml");
	require(dirname(__FILE__).'/lib/autoload.php');
	use phpcassa\ColumnFamily;
	use phpcassa\ColumnSlice;
	use phpcassa\Connection\ConnectionPool;

	//main
	echo('<test>');
	if(isset($_REQUEST['user'])){
		echo('<user>'.$_REQUEST['user'].'</user>');
		echo('<data>'.$_REQUEST['data'].'</data>');
		echo('<result>'.set($_REQUEST['user'],$_REQUEST['data']).'</result>');
	}else{
		echo ("<result>Error. user data is 'null', or not Numeric.</result>");
	}
 	echo('</test>');
 
 	//cassandraへの書き込み
 	function set($userName,$value){

 		try{
			//setting of IP address
			$servers = array('localhost:9160');
			//setting of Keyspace and ColumnFamily
			$pool = new ConnectionPool('Standard1', $servers);
			$column_family = new ColumnFamily($pool, 'user');
		
			//insert data
			$column_family->insert($userName,
				array(
						time()=> $value
				)
			);

			$pool->close();
			return('success!');				
		
 		}catch(phpcassa\Connection\NoServerAvailable $e){
				return('error!');
		}catch(phpcassa\Connection\MaxRetriesException $e){
				return('error!');
		}catch(Exception $e){
				return('error!');
		}

 	}
 
?>