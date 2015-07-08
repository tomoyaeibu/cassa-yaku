<?php
	header('Content-type: application/json');
	mb_language("uni");
	mb_internal_encoding("utf-8");
	mb_http_input("auto");
	mb_http_output("utf-8");
	
	//main (Rooting end Exception Handling)
	if(isset($_REQUEST['user']) and isset($_REQUEST['content'])){
		post($_REQUEST['user']);
	}else{
		exception_noParameter();
	}

	/*---------- Read from MongoDB----------
	int get($userName)
	---------------------------------------*/
	function post($userName){
		//meta infomation
		$meta = metaInformation();


		//success message
		$success = array(
			'message' => 'successfully completed'
		);

		//to json
		$result = array(
			'meta'=>$meta,
			'success'=>$success
		);
    	echo json_encode($result);
	}

	/*---------- Exception [noParameter]----------
	void exception_noParameter()
	---------------------------------------------*/
	function exception_noParameter(){
		//meta infomation
		$meta = metaInformation();

		//error message
		$error = array(
			'message' => 'Error. user data or content data is NULL'
		);

		//to json
		$result = array(
			'meta'=>$meta,
			'error'=>$error
		);
    	echo json_encode($result);
	}

	/*---------- Infotmation of meta ------------
	Array metaInformation()
	---------------------------------------------*/
	function metaInformation(){
		$meta = array(
			'url' => 'api/post.json',
			'method' => 'post',
			'user' => $_REQUEST['user'],
			'content' => $_REQUEST['content'],
		);
		return($meta);
	}


?>