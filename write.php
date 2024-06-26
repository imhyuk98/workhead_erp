<?php

include 'dbconfig.php';

//print_r($_POST);

// 입력 여부 확인
$name     = (isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : '';
$password = (isset($_POST['password']) && $_POST['password'] != '') ? $_POST['password'] : '';
$subject  = (isset($_POST['subject']) && $_POST['subject'] != '') ? $_POST['subject'] : '';
$content  = (isset($_POST['content']) && $_POST['content'] != '') ? $_POST['content'] : '';
$code     = (isset($_POST['code']) && $_POST['code'] != '') ? $_POST['code'] : '';

if ($code == 'undefined') {
    $code = 'freeboard';
}

// 비밀번호 단방향 암호화
$pwd_hash = password_hash($password, PASSWORD_BCRYPT);

// 정규식, 정규표현식 EXP
preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $content, $matches);

// 이미지
$img_array = [];
foreach ($matches[1] as $key => $val) {
    //echo $val;
    //echo "<br>";
    // data:image/png;base64,AAAFBfjadsjkfaldsk
    list($type, $data) = explode(';', $val);
    // $type : date:image/png
    // $data : base64,AAAFBfjadsjkfaldsk
    list(, $ext) = explode('/', $type);
    $ext = ($ext == 'jpeg') ? 'jpg' : $ext;
    $filename = date('YmdHis') . '_' . $key . '.' . $ext; // 20230212111111_0.png

    list(, $base64_decode_data) = explode(',', $data);

    // 업로드
    $rs_code = base64_decode($base64_decode_data);
    file_put_contents("upload/" . $filename, $rs_code);

    $img_array[] = "upload/" . $filename;
    $content = str_replace($val, "upload/" . $filename, $content);
}

$imglist = implode('|', $img_array);

// DB에 Insert

$sql = "INSERT INTO mboard (code, name, subject, password, content, imglist, ip, rdate)
VALUES(:code, :name, :subject, :password, :content, :imglist, :ip, NOW())";

$ip = $_SERVER['REMOTE_ADDR'];

$stmt = $conn->prepare($sql);
$stmt->bindParam(':code', $code);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':subject', $subject);
$stmt->bindParam(':content', $content);
$stmt->bindParam(':password', $pwd_hash);
$stmt->bindParam(':imglist', $imglist);
$stmt->bindParam(':ip', $ip);
$stmt->execute();

$arr = ['result' => 'success'];

$j = json_encode(($arr)); // {"result" : "success"}
die($j);
