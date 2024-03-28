<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'workhead';

// DB 연결 여부 확인
try {
    $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $db, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    #echo "DB 연결 성공";
} catch (PDOException $e) {
    #echo "Connection failed: " . $e->getMessage();
}
