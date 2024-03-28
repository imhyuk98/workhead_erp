<?php

session_start();

$edit_idx = (isset($_SESSION['edit_idx']) && $_SESSION['edit_idx'] != '' && is_numeric($_SESSION['edit_idx'])) ? $_SESSION['edit_idx'] : '';


include '../dbconfig.php';

$name     = (isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : '';
$password = (isset($_POST['password']) && $_POST['password'] != '') ? $_POST['password'] : '';
$number  = (isset($_POST['number']) && $_POST['number'] != '') ? $_POST['number'] : '';
$depart  = (isset($_POST['depart']) && $_POST['depart'] != '') ? $_POST['depart'] : '';
$content  = (isset($_POST['content']) && $_POST['content'] != '') ? $_POST['content'] : '';
$code     = (isset($_POST['code']) && $_POST['code'] != '') ? $_POST['code'] : '';
$idx     = (isset($_POST['idx']) && $_POST['idx'] != '' && is_numeric($_POST['idx'])) ? $_POST['idx'] : '';

if($idx == '') {
    $arr = ['result' => 'empty_idx'];
    die(json_encode($arr));
}

if ($edit_idx != $idx) {
    $arr = ['result' => 'denied'];
    die(json_encode($arr));
}
 
$pwd_hash = '';

if ($password != '') {
    $pwd_hash = password_hash($password, PASSWORD_BCRYPT);
}

preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $content, $matches);

$img_array = [];
foreach($matches[1] AS $key => $row) {
    // 이미 업로드된 이미지
    if ( substr($row, 0, 6) == 'upload') {
        $img_array[] = $row;
        continue;
    }

    // 외부 링크 이미지는 skip
    if (substr($row, 0, 5) != 'data:') {
        continue;
    }

    list($type, $data) = explode(';', $row);
    list(,$data) = explode(',', $data);

    $data = base64_decode($data);

    list(, $ext) = explode('/', $type);

    $ext = ($ext == 'jpeg') ? 'jpg' : $ext;

    $filename = date('YmdHis') . '_' . $key . '.' . $ext;

    file_put_contents('upload/'. $filename, $data);

    $content = str_replace($row, 'upload/'. $filename, $content);
    $img_array[] = 'upload/' . $filename;
}

$imglist = implode('|', $img_array);

if($pwd_hash != '') {
    $sql = "UPDATE students SET stu_name=:name, stu_dep=:depart, stu_num=:number, stu_img=:imglist, stu_con=:content, password=:password WHERE idx=:idx";
} else {
    $sql = "UPDATE students SET stu_name=:name, stu_dep=:depart, stu_num=:number, stu_img=:imglist, stu_con=:content WHERE idx=:idx";
}


$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);

if ($pwd_hash != '') {
    $stmt->bindParam(':password', $pwd_hash);
}

$stmt->bindParam(':name', $name);
$stmt->bindParam(':number', $number);
$stmt->bindParam(':depart', $depart);
$stmt->bindParam(':content', $content);
$stmt->bindParam(':imglist', $imglist);
$stmt->bindParam(':idx', $idx);
$stmt->execute();

$arr = ['result' => 'success'];

die(json_encode($arr));