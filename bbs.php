<?php
/**
 * Created by PhpStorm.
 * User: jerise
 * Date: 2018/3/31
 * Time: 16:02
 */

require('./db.class.php');


$user_id = isset($_SESSION['userid']) ? $_SESSION['userid'] : 1;

$data = $_POST;
$data['user_id'] = $user_id;


$result  =[
    'user_info'=>[],
    'user_fs'=>[],
];


$result['user_info'] = get_user_info($user_id);
$result['user_fs'] = get_fs($user_id);

print_r($result);



#user_info
function add_bbs($data){
    global $db;
    $followSql = "INSERT INTO bbs ('user_id,content,to_user_id') VALUE('{$data['user_id']}','{$data['content']},{$data['to_userid']}')";
    $smt = $db->prepare($followSql);
    if($smt->execute()){
        $db->lastInsertId();

        $_SESSION['userid']=$db->lastInsertId();;
        header('Location: ../indexList.php');

    }else{
        echo "<script>alert('注册成功');history.go(-1)</script>";
    }
}



#fs
function get_fs($user_id){
    global $db;
    $sql = 'select * from fs where user_id='.$user_id;
    $sth = $db->prepare($sql);
    $sth->execute();
    return $sth->fetchAll();
}

require('./html/space.php');





