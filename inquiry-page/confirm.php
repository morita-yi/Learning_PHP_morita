<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
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
                    <input type="text" value="<?php echo $_SESSION['name']?>" id="name" readonly>
                </td>
            </tr>
            <tr>
                <th>メールアドレス:</th>
                <td>
                    <input type="text" value="<?php echo $_SESSION['email']?>" id="email" readonly>
                </td>
            </tr>
            <tr>
                <th>電話番号:</th>
                <td>
                    <input type="text" value="<?php echo $_SESSION['phone']?>" id="phone" readonly>
                </td>
            </tr>
            <tr>
                <th>件名:</th>
                <td>
                    <input type="text" value="<?php echo $_SESSION['subject']?>" id="subject" readonly>
                </td>
            </tr>
            <tr>
                <th>お問い合わせ内容:</th>
                <td>
                    <input type="text" value="<?php echo $_SESSION['inquiry']?>" id="inquiry" readonly>
                </td>
            </tr>
        </table>
        <br>

        <div id="send" class="button ">
            <button class="button2" type="submit">上記の内容で送信する</button>
        </div>
        <br>            

        <form action="re_edit.php" method="post">
            <div class="button">
                <button class="button1" type="submit">内容を変更する</button>
            </div>
        </form>
        <br>

        <div class="link">
            <a href='./inquiry.php'>topページに戻る</a>
        </div>

        <div id="result"></div>

        <script>
            $(function(){
                $("#send").on("click",function(event){
                    name=$("#name").val();
                    email=$("#email").val();
                    phone=$("#phone").val();
                    subject=$("#subject").val();
                    inquiry=$("#inquiry").val();
                    $.ajax({
                        type:"POST",
                        url:"./send.php",
                        data:{
                            "name":name,
                            "email":email,
                            "phone":phone,
                            "subject":subject,
                            "inquiry":inquiry
                            },
                        datatype:"json"
                    }).done(function(data){
                        $("#result").text(alert(data.res));
                        window.location.href = './inquiry.php';
                    }).fail(function(XMLHttpRequest,textStatus,error){
                        alert(error);
                    })
                })
            })
        </script>
        
    </body>
</html>