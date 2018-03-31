<?php
/**
 * Created by PhpStorm.
 * User: jerise
 * Date: 2018/3/31
 * Time: 16:02
 */


$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : 1;

if (!empty($_SESSION['userid'])) {
    $userInfo['userid'] = $_SESSION['user_id'];
    $userInfo['username'] = $_SESSION['user_name'];
}

if(empty($_GET['uid']) || !is_numeric($_GET['uid'])) {
    exit('参数错误');
}
$lookUid = $_GET['uid'];

require('./db.class.php');

require('./html/space.php');


$result  =[
    'user_info'=>[],
    'user_fs'=>[],
];


$result['user_info'] = get_user_info($user_id);
$result['user_fs'] = get_fs($user_id);


print_r($result);
die;

#
function get_user_info($user_id){
    global $db;
    $sql = 'select id,username,bbs,fs from user where id='.$user_id;
    $sth = $db->prepare($sql);
    $sth->execute();
    return $sth->fetchAll();
}



#
function get_fs($user_id){
    global $db;
    $sql = 'select * from fs where user_id='.$user_id;
    $sth = $db->prepare($sql);
    $sth->execute();
    return $sth->fetchAll();
}

