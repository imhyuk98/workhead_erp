<?php

include "dbconfig.php";

//print_r($_POST);

$id = $_POST['id'];
$pw = $_POST['pw'];
// print_r($id);
// print_r($pw);
$sql = "SELECT * FROM `member` WHERE user_id=:user_id AND passwd=:pw";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $id);
$stmt->bindParam(':pw', $pw);
$stmt->execute();
$row = $stmt->fetch();


if($row) {
    session_start();
    $_SESSION['id'] = $id;

    $arr = ['result' => 'success'];
    die(json_encode($arr));

} else {
    $arr = ['result' => 'fail'];
    die(json_encode($arr));
}