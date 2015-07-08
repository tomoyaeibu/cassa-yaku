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
		echoResultAsXml(get($_REQUEST['user']));
	}else{
		echo ("<result>Error. user data is 'null', or not Numeric.</result>");
	}

 	echo('</test>');

//cassandraへの読み込み
function get($userName){
	try{
		//setting of IP address
		$servers = array('localhost:9160');
		//setting of Keyspace and ColumnFamily
		$pool = new ConnectionPool('Standard1', $servers);
		$column_family = new ColumnFamily($pool, 'user');
		
		//結果を取得
		$result = $column_family->get($userName);
		return($result);
		
 	}catch(phpcassa\Connection\NoServerAvailable $e){
			return('error');
	}catch(phpcassa\Connection\MaxRetriesException $e){
			return('error');
	}catch(Exception $e){
			return('error');
	}
}

//結果の整形
function echoResultAsXml($result){
	$post_number=0;
	if(stristr($result,'error')){ echo ('<result>error</result>');}
	
	//$result = array_reverse($result);    //記事を時間順に逆転
	foreach ($result as $key => $value){ 
		echo('<result><post_number>'.$post_number.'</post_number>');
		echo('<time_stamp>'.$key.'</time_stamp>');
		echo('<body>'.$value.'</body></result>');
		$post_number++;
	}

}

 
?>