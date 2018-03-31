<?php
/**
 * Created by PhpStorm.
 * User: jerise
 * Date: 2018/3/31
 * Time: 16:02
 */

if (!empty($_SESSION['userid'])) {
    $userInfo['userid'] = $_SESSION['user_id'];
    $userInfo['username'] = $_SESSION['user_name'];
}

if(empty($_GET['uid']) || !is_numeric($_GET['uid'])) {
    exit('参数错误');
}
$lookUid = $_GET['uid'];

require('./db.class.php');

$sql = 'select id,username,bbs,fs from user where id='.$lookUid;
$sth = $db->prepare($sql);
//$db->bindParam(':calories', $calories, PDO::PARAM_INT);
//$db->bindParam(':colour', $colour, PDO::PARAM_STR, 12);
$sth->execute();
$result = $sth->fetchAll();


require('./html/space.php');