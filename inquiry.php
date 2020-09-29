<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>お問い合わせ</title>
        <link href="./style/style2.css" rel="stylesheet"> 
    </head>

    <body>
        <h1>お問い合わせ</h1>
        <br>
        <p>お問い合わせは下記フォームより。1~2日で返信いたします。</p>
        <br>
            
        <form action="confirm.php" method="post" name="Form1">
            <table class="inquiry_form" align="center" rules="groups">
                <tbody>
                    <tr>
                        <th>
                            <label class="tytle">お名前</label><span class="label-danger">必須</span>
                        </th>
                        <td>
                            <input type="text" name="name" required>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <label class="tytle">メールアドレス</label><span class="label-danger">必須</span>
                        </th>
                        <td>
                            <input type="text" name="email" required>
                        </td>
                    </tr>
                
                    <tr>
                        <th>
                            <label>電話番号</label><span class="label-danger2">  </span>
                        </th>
                        <td>
                            <input type="text" name="phone">
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <label class="tytle">件名</label><span class="label-danger">必須</span>
                        </th>
                        <td class="td2">
                            <label class=" ">
                                <input type="radio" name="subjectR" value="checkbox1" checked onclick="changeDisabled()">資料について
                            </label>
                            <label class=" ">
                                <input type="radio" name="subjectR" value="checkbox2" onclick="changeDisabled()">内容について
                            </label>
                            <br>
                            <label class=" ">
                                <input type="radio" name="subjectR" value="other" onclick="changeDisabled()">その他
                            </label>
                            
                            <input type="text" name="subject" required onclick="changeDisabled()">
                        </td>
                    </tr>
                </tbody>

                <tfoot>
                    <tr>
                        <th>
                            <label>お問い合わせ内容</label><span class="label-danger">必須</span>
                        </th>
                        <td>
                            <textarea class="inquiry_input" name="inquiry" required cols="40" rows="10"></textarea>
                        </td>
                    </tr>
                </tfoot>

            </table>

            <br>
            <div class="button">
                <button class="button1" type="submit">お問い合わせ内容を確認</button>
            </div>

        </form>


        <script type="text/javascript">
            function changeDisabled() {
                if(document.Form1["subjectR"][2].checked) {
                    document.Form1["subject"].disabled = false;
                } else {
                    document.Form1["subject"].disabled = true;
                }
            }
            window.onload = changeDisabled;

        </script>

    </body>
</html>