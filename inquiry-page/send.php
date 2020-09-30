<?php
require_once('./common.php');

$name    = $_POST['name'];
$email   = $_POST['email'];
$phone   = $_POST['phone'];
$subject = $_POST['subject'];
$inquiry = $_POST['inquiry'];

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

$msg=array();
// 登録処理
$sql ="INSERT INTO inquiry_data(email,name,phone,subject,inquiry) VALUES('${email}','${name}','${phone}','${subject}','${inquiry}')";
try{
    $pdo->query_run($sql);
    $msg['res'] = '送信が完了しました。トップページに戻ります。';
}catch(PDOException $e) {
    $msg['res'] = '送信nできませんでした';
    //echo 'Error:'.$e->getMessage();
}

header("Content-type: application/json; charset=UTF-8");
echo json_encode($msg);

?>