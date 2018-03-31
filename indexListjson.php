<?php
/**
 * Created by PhpStorm.
 * User: jerise
 * Date: 2018/3/31
 * Time: 16:02
 */

if (!empty($_SESSION['user_id'])) {
    $userInfo['user_id'] = $_SESSION['user_id'];
    $userInfo['user_name'] = $_SESSION['user_name'];
} else {
    $arr = [
        'status' => 500,
        'message' => '请登录',
        'data' => [],
    ];
    echo json_encode($arr, JSON_UNESCAPED_UNICODE);exit;
}

require('./db.class.php');

$sql = 'select id,username,bbs,fs from user limit 0,10';
$sth = $db->prepare($sql);
//$db->bindParam(':calories', $calories, PDO::PARAM_INT);
//$db->bindParam(':colour', $colour, PDO::PARAM_STR, 12);
$sth->execute();
$result = $sth->fetchAll();

$arr = [
    'status' => 200,
    'message' => '提交成功',
    'data' => $result,
];

echo json_encode($arr, JSON_UNESCAPED_UNICODE);exit;