<?php
/**
 * Created by PhpStorm.
 * User: jerise
 * Date: 2018/3/31
 * Time: 16:02
 */

require ('./db.class.php');

$sql = 'select * from user';


$sth = $db->prepare($sql);
//$db->bindParam(':calories', $calories, PDO::PARAM_INT);
//$db->bindParam(':colour', $colour, PDO::PARAM_STR, 12);
$sth->execute();
$result = $sth->fetchAll();
var_dump($result);