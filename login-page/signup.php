<?php
require_once('config.php');
require_once('common.php');

//post
if (!$email=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    echo '入力された値が不正です';
    return false;
}

//テーブル作成
$sql = 'CREATE TABLE IF NOT EXISTS userdata(
    id SERIAL NOT NULL ,
    email VARCHAR(255) PRIMARY KEY,
    PASSWORD VARCHAR(255),
    created_at TIMESTAMP NOT NULL DEFAULT current_timestamp
    )';

$pdo = new Postgresql($email);
$pdo->query_run($sql);

//パスワードチェック
if(preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i',$_POST['password'])) {
    $password = password_hash(($_POST['password']),PASSWORD_DEFAULT);
} else {
    echo 'パスワードは半角英数字を含んだ8文字以上で設定してください';
    return false;
}

//登録処理
try{
    $pdo->insert($password);
    echo '登録完了';
}catch(PDOException $e) {
    echo 'メールアドレスが既に使用されています';
}
?>