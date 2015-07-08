<?php
	header('Content-type: application/json');
	mb_language("uni");
	mb_internal_encoding("utf-8");
	mb_http_input("auto");
	mb_http_output("utf-8");
	
	//main (Rooting end Exception Handling)
	if(isset($_REQUEST['user']) and isset($_REQUEST['content'])){
		post($_REQUEST['user'],$_REQUEST['content']);
	}else{
		exception_noParameter();
	}

	/*---------- Post to MongoDB----------
	int post($userName, &content)
	---------------------------------------*/
	function post($userName, $content){
		//meta infomation
		$meta = metaInformation();

		// mongo Instance
		$mongo = new Mongo();
		// select DB and Collection
		$db = $mongo->selectDB("cassa-yaku");
		$coll = $db->selectCollection("user-Tweets");

		$successOrNot=$coll->update(
			array('tweet_ID' => time()),
    		$postData = array(
    			'user_name' => $userName,
    			'timestamp' => time(),
    			'content' => $content
   	 		), 
    		array('upsert' => true) 
		);

		//check status
		if($successOrNot){
			//success message
			$status = array(
				'message' => 'successfully completed'
			);
		}else{
			//failure message
			$status = array(
				'message' => 'unccessfully failed over'
			);
		}

		//to json
		$result = array(
			'meta'=>$meta,
			'status'=>$status
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