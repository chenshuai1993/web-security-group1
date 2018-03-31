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
$followSql    = "insert into user(username,password,create_date) value($username,$password,$time)";
$smt = $db->prepare($followSql);
if($smt->execute()){
    

}