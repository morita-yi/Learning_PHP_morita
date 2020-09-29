<?php

session_start();

//ログイン済みの場合
if(isset($_SESSION['email'])) {
    echo 'ようこそ'.$_SESSION['email'].'さん<br>';
    echo "<a href='/logout.php'>ログアウト</a>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link href="styles/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="login">
            <h1>ログイン</h1>
            <form action="edit.php" method="post">
                <label for="email">email</label>
                <input type="email" name="email">
                <label for="password">password</label>
                <input type="password" name="password">
                <input type="submit" value="Sign in" name="value_type">
            </form>
        </div>

        <p><a href='/change.php'>パスワードの変更はこちら</a></p>

        <div class="signup">
            <h1>新規登録</h1>
            <form action="edit.php" method="post">
                <label for="email">email</label>
                <input type="email" name="email">
                <label for="password" name="password">password</label>
                <input type="password" name="password">
                <input type="submit" value="Sign up" name="value_type">
                <p>パスワードは半角英数字を含んだ8文字以上で設定</p>
            </form>        
        </div>

        <div class="delete">
            <h1>登録情報の消去</h1>
            <form action="edit.php" method="post">
                <label for="email">email</label>
                <input type="email" name="email">
                <label for="password" name="password">password</label>
                <input type="password" name="password">
                <input type="submit" value="Delete" name="value_type">
            </form> 
        </div>
    </body>
</html>