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

#更新
add_bbs($data);

#user_info
function add_bbs($data){
    global $db;
    $followSql = "INSERT INTO bbs (user_id,content,to_user_id) VALUE({$data['user_id']},'{$data['content']}',{$data['to_userid']})";
    $smt = $db->prepare($followSql);
    $smt->execute();
}



$result  =[
    'user_info'=>[],
    'user_fs'=>[],
];

$fs_id = 3;

$result['user_info'] = get_user_info($user_id);
$result['user_fs'] = get_fs($user_id);

#print_r($result);



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





