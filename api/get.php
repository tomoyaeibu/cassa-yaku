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
		$userData=array(
    		'id'=>'1',
    		'name'=>'Abe Tomoya',
    		'age'=>'23',
    		'sex'=>'male'
    	);

    	echo json_encode($userData);
	}

?>