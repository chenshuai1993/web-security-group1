<?php
/**
 * Created by PhpStorm.
 * User: xiaowangzi
 * Date: 2018/3/31
 * Time: 下午4:14
 */
session_start();
include('../db.class.php');
$username = $_POST['username'];
$password=$_POST['password'];
$time = time();
$followSql    = "insert into user(username,password,create_date) value('".$username."','".$password."',$time)";
$smt = $db->prepare($followSql);
if($smt->execute()){
//    $_SES
//    echo 'aaa';
    $db->lastInsertId();

    $_SESSION['userid']=$db->lastInsertId();;
    $_SESSION['username']=$username;
    header('Location: ../indexList.php');

}else{
    echo "<script>alert('注册成功');history.go(-1)</script>";
}