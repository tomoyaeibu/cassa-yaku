<?php
    require(dirname(__FILE__).'/lib/autoload.php');

    use phpcassa\ColumnFamily;
    use phpcassa\ColumnSlice;
    use phpcassa\Connection\ConnectionPool;

    try{
    
        $servers = array('localhost:9160');
        $pool = new ConnectionPool('Standard1', $servers);

        $user = new ColumnFamily($pool, 'user');

        //データの挿入
        $user->insert('eibu',
            array(
                'email' => 'ng@gmail.com',
                'gender' => 'female',
            )
        );
/*	
        //データの更新
        $user->insert('memorycraftgirl', array('email'=>'memorycraft+girl@gmail.com'));

        //キーで全カラムを取得  
        $girl = $user->get('memorycraftgirl');
        echo 'girl = ' . print_r($girl, true);

        //キーでカラムを指定して取得
        $email = $user->get('memorycraftgirl', null, array('email'));
        echo 'email = ' . print_r($email, true);

        //複数キーを指定して取得
        $users = $user->multiget(array('memorycraft', 'memorycraftgirl'));
        echo 'users = ' . print_r($users, true);


        //カラムの削除
        $user->remove('memorycraftgirl', array('email'));
        echo 'girl after remove column = ' . print_r($user->get('memorycraftgirl'), true);

        //行の削除
        $user->remove('memorycraftgirl');
        echo 'girl after remove row = ' . print_r($user->get('memorycraftgirl'), true);
*/
        $pool->close();
    }
    catch(Exception $e){
        echo 'ERROR : ' . print_r($e, true);
    }
?>