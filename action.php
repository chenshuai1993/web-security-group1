<?php
session_start();
include_once 'db.class.php';

function follow()
{
    $followId     = $_GET['id'];
    $userId       = $_SESSION['user_id'];
    $followSql    = "insert into fs(user_id,follow_id) value($userId,$followId),($followId,$userId)";
    $smt = $db->prepare($sql);
    if($smt->execute()){
        echo $smt->rowCount();
    }
}

function unfollow()
{
    $userId       = $_SESSION['user_id'];
    $cancleUserId = $_GET['id'];
    $ids = $userId .','.$cancleUserId;
    $sql = "delete from user where id in ($ids)";
    $smt = $db->prepare($sql);
    if($smt->execute){
        echo $smt->rowCount();
    }
}



