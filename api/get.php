<?php
	header('Content-type: application/json');
	mb_language("uni");
	mb_internal_encoding("utf-8");
	mb_http_input("auto");
	mb_http_output("utf-8");
	
	//main (Rooting end Exception Handling)
	if(isset($_REQUEST['user'])){
		get($_REQUEST['user']);
	}else{
		exception_noParameter();
	}

	/*---------- Read from MongoDB----------
	int get($userName)
	---------------------------------------*/
	function get($userName){
		
	}

	/*---------- Exception [noParameter]----------
	void exception_noParameter()
	---------------------------------------------*/
	function exception_noParameter(){

		//meta infomation
		$meta = array(
			'url' => 'api/get.json',
			'method' => 'get'
		)
		//array_push($result,'meta'=>$meta);

		//error message
		$error = array(
			'message' => 'Error. user data is NULL'
		)
		//array_push($result,'error'=>$error);

		//to json
		$result = array(
			'meta'=>$meta,
			'error'=>$error
		)
    	echo json_encode($result);
		}
	}

?>