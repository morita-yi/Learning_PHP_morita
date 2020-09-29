<?php
require_once('./common.php');
session_start();
$name    = $_SESSION['name'];
$email   = $_SESSION['email'];
$phone   = $_SESSION['phone'];
$subject = $_SESSION['subject'];
$inquiry = $_SESSION['inquiry'];

//テーブル作成
$sql = 'CREATE TABLE IF NOT EXISTS inquiry_data(
    id SERIAL NOT NULL,
    email VARCHAR(255),
    name VARCHAR(255),
    phone VARCHAR(255),
    subject VARCHAR(255),
    inquiry VARCHAR(255),
    created_at TIMESTAMP NOT NULL DEFAULT current_timestamp
    )';

$pdo = new Postgresql($email);
$pdo->query_run($sql);


// 登録処理
$sql ="INSERT INTO inquiry_data(email,name,phone,subject,inquiry) VALUES('${email}','${name}','${phone}','${subject}','${inquiry}')";
try{
    $pdo->query_run($sql);
    echo '送信完了';
}catch(PDOException $e) {
    echo '送信できませんでした';
    echo 'Error:'.$e->getMessage();
}

echo "<a href='./top.php'>topページに戻る</a>";

?>