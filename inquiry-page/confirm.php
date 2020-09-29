<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>お問い合わせ内容確認</title>
        <link href="./style/style2.css" rel="stylesheet"> 

        <?php
            session_start();
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['email'] = $_POST['email'];
            if(empty($_POST['phone'])) {
                $_SESSION['phone'] = "記入なし";
            } else {
                $_SESSION['phone'] = $_POST['phone'];
            }
            $value = $_POST['subjectR'];
            switch($value) {
                case 'checkbox1':
                    $_SESSION['subject'] = "資料について";
                break;

                case 'checkbox2':
                    $_SESSION['subject'] = "内容について";
                break;

                default:
                    $_SESSION['subject'] = $_POST['subject'];
            }
            $_SESSION['inquiry'] = $_POST['inquiry'];
        ?>
    </head>

    <body>
        <p>お問い合わせ内容をご確認ください。</p>
        <table class="confirm_table" align="center">
            <tr>
                <th>お名前:</th>
                <td>
                    <?php echo $_SESSION['name']?>
                </td>
            </tr>
            <tr>
                <th>メールアドレス:</th>
                <td>
                    <?php echo $_SESSION['email']?>
                </td>
            </tr>
            <tr>
                <th>電話番号:</th>
                <td>
                    <?php echo $_SESSION['phone']?>
                </td>
            </tr>
            <tr>
                <th>件名:</th>
                <td>
                    <?php echo $_SESSION['subject']?>
                </td>
            </tr>
            <tr>
                <th>お問い合わせ内容:</th>
                <td>
                    <?php echo $_SESSION['inquiry']?>
                </td>
            </tr>
        </table>
        <br>

        <form action="send.php" method="post">
            <div class="button ">
                <button class="button2" type="submit">上記の内容で送信する</button>
            </div>
        </form>
        <br>

        <form action="re_edit.php" method="post">
            <div class="button">
                <button class="button1" type="submit">内容を変更する</button>
            </div>
        </form>

        
    </body>
</html>