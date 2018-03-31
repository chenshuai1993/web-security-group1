<?php
/**
 * Created by PhpStorm.
 * User: jerise
 * Date: 2018/3/31
 * Time: 16:02
 */

require('./db.class.php');

$user_id = isset($_SESSION['userid']) ? $_SESSION['userid'] : 1;

if (!empty($_SESSION['userid'])) {
    $userInfo['userid'] = $_SESSION['user_id'];
    $userInfo['username'] = $_SESSION['user_name'];
}

if(empty($_GET['uid']) || !is_numeric($_GET['uid'])) {
    exit('参数错误');
}
$lookUid = $_GET['uid'];





$result  =[
    'user_info'=>[],
    'user_fs'=>[],
];


$result['user_info'] = get_user_info($user_id);
$result['user_fs'] = get_fs($user_id);

print_r($result);



#user_info
function get_user_info($user_id){
    global $db;
    $sql = 'select id,username,bbs,fs from user where id='.$user_id;
    $sth = $db->prepare($sql);
    $sth->execute();
    return $sth->fetch();
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





