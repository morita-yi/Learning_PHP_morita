<?php
session_start();
$output='';
if(isset($_SESSION['email'])){
    $output = 'ログアウトしました';
}else{
    $output = 'セッションが切れました';
}

//セッション変数のクリア
$_SESSION = array();

//セッションクッキーも削除
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

//セッションのクリア
@session_destroy();

echo $output.'<br>';
echo '5秒後に自動的にトップページに戻ります。<br>';

echo "<a href='/top.php'>ページが遷移しない場合はここをクリックしてください</a>"

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <title>Logout</title>
    <meta http-equiv="refresh" content=" 5; url=./top.php">
</head>
