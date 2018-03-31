<?php
/**
 * Created by PhpStorm.
 * User: xiaowangzi
 * Date: 2018/3/31
 * Time: 下午3:59
 */
session_start();

include('../db.class.php');
//获取说句
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "select * from user where username = '".$username."'";
$rs = $db->query($sql);
$result_arr = $rs->fetchAll();
//print_r($result_arr);
if($result_arr&&   $result_arr[0]['password']==$password){
    echo '登录成功';
    $_SESSION['userid']=$result_arr[0]['id'];
    $_SESSION['username']=$result_arr[0]['username'];
    header('Location: ../indexList.php');
}else{
//    header('Location: http:../login.htm');
    echo "<script>alert('登录失败');history.go(-1)</script>";
}
