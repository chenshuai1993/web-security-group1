<?php
session_start();
include_once 'db.class.php';

follow($db);

function follow($db)
{
    $followId     = $_POST['id'];
    $userId       = isset($_SESSION['userid']) ? $_SESSION['userId'] : 100;
    $followSql    = "insert into fs(user_id,follow_id) value($userId,$followId),($followId,$userId)";
    $smt = $db->prepare($followSql);
    if($smt->execute()){
        $res = ['msg'=>'成功','status'=>1,'data'=>''];
        echo json_encode($res);
        exit;
    }
}

function unfollow()
{
    $userId       = $_SESSION['userid'];
    $cancleUserId = $_POST['id'];
    $ids = $userId .','.$cancleUserId;
    $sql = "delete from user where id in ($ids)";
    $smt = $db->prepare($sql);
    if($smt->execute){
        echo $smt->rowCount();
    }
}



