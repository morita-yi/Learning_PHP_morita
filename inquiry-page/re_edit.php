<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>お問い合わせ内容編集</title>
        <link href="./style/style2.css" rel="stylesheet"> 

        <?php
            session_start();
            $name    = $_SESSION['name'];
            $email   = $_SESSION['email'];
            $phone   = $_SESSION['phone'];
            $subject = $_SESSION['subject'];
            $inquiry = $_SESSION['inquiry'];
        ?>
    </head>

    <body>
        <p>※ブラウザの戻る機能は使用しないでください。</p>
        <form action="confirm.php" method="post" name="Form1">
            
        <table class="inquiry_form" align="center" rules="groups">
                <tbody>
                    <tr>
                        <th>
                            <label>お名前</label><span class="label-danger">必須</span>
                        </th>
                        <td>
                            <input type="text" value="<?php echo $name;?>" name="name" required>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <label>メールアドレス</label><span class="label-danger">必須</span>
                        </th>
                        <td>
                            <input type="text" value="<?php echo $email;?>" name="email" required>
                        </td>
                    </tr>
                
                    <tr>
                        <th>
                            <label>電話番号</label><span class="label-danger2">  </span>
                        </th>
                        <td>
                            <input type="text" value="<?php echo $phone;?>" name="phone">
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <label>件名</label><span class="label-danger">必須</span>
                        </th>
                        <td>
                            <input type="hidden" name="subjectR" value="">
                            <input type="text" value="<?php echo $subject;?>" name="subject" required>
                        </td>
                    </tr>
                </tbody>

                <tfoot>
                    <tr>
                        <th>
                            <label>お問い合わせ内容</label><span class="label-danger">必須</span>
                        </th>
                        <td>
                            <textarea class="inquiry_input" name="inquiry" required cols="30" rows="5" ><?php echo $inquiry;?></textarea>
                        </td>
                    </tr>
                </tfoot>

            </table>

            <br>
            <div class="button">
                <button class="button1" type="submit">お問い合わせ内容を確認</button>
            </div>

        </form>
    </body>
</html>