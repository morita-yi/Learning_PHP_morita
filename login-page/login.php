<?php
require_once('common.php');
require_once('config.php');
session_start();
//post
if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    echo '入力された値が不正です。';
    return false;
}

//POSTしたメールアドレスをDBで検索
$pdo = new Postgresql($_POST['email']);
$rows = $pdo->select();

//emailがDB内に存在するかの確認
if(!isset($rows['email'])){
    echo 'メールアドレスまたはパスワードが間違っています。'."\n";
    return false;
}

//パスワード確認
if(password_verify($_POST['password'],$rows['password'])){
    session_regenerate_id(true);
    $_SESSION['email'] = $rows['email'];
    echo 'ログインしました';
}else {
    echo 'メールアドレス又はパスワードが間違っています。';
    return false;
}




?>
