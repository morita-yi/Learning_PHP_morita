<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link href="styles/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="change">
            <h1>パスワード変更</h1>
            <form action="edit.php" method="post">
                <label for="email">email</label>
                <input type="email" name="email">
                <label for="password" name="password">現在のpassword</label>
                <input type="password" name="password">
                <label for="newpass" name="newpass">新しいpassword</label>
                <input type="password" name="newpass">
                <input type="submit" value="パスワードを変更" name="value_type">
            </form>        
        </div>
    </body>
</html>