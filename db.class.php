<?php

$dbms='mysql';     //数据库类型
$host='123.56.15.74'; //数据库主机名
$dbName='demo';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='123123.';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";

try {
    //$db = new PDO($dsn, $user, $pass,array(PDO::ATTR_PERSISTENT => true)); //初始化一个PDO对象
    $db = mysqli_connect($host,$user,$pass,$dbName);
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}





