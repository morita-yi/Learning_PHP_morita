<?php
require_once('common.php');
session_start();

//post
if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    echo '入力された値が不正です。';
    return false;
}


if($_POST['value_type']=='Sign up'){
    //テーブル作成
    $sql = 'CREATE TABLE IF NOT EXISTS userdata(
        id SERIAL NOT NULL ,
        email VARCHAR(255) PRIMARY KEY,
        PASSWORD VARCHAR(255),
        created_at TIMESTAMP NOT NULL DEFAULT current_timestamp
        )';

    $pdo = new Postgresql($_POST['email']);
    $pdo->query_run($sql);

    //パスワードチェック
    if(preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i',$_POST['password'])) {
        $password = password_hash(($_POST['password']),PASSWORD_DEFAULT);
    } else {
        echo 'パスワードは半角英数字を含んだ8文字以上で設定してください';
        return false;
    }

    // 登録処理
    try{
        $pdo->insert($password);
        echo '登録完了';
    }catch(PDOException $e) {
        echo 'メールアドレスが既に使用されています';
    }

    die();
}

//POSTしたメールアドレスをDBで検索
$pdo = new Postgresql($_POST['email']);
$rows = $pdo->select();

//emailがDB内に存在するかの確認
if(!isset($rows['email'])){
    echo 'メールアドレスまたはパスワードが間違っています'."\n";
    return false;
}

//パスワード確認
if(password_verify($_POST['password'],$rows['password'])){
    switch($_POST['value_type']){
        case 'Sign in':
            session_regenerate_id(true);
            $_SESSION['email'] = $rows['email'];
            echo 'ログインしました';
        break;

        case 'Delete':
            $pdo->delete();
            echo '登録情報の消去に成功しました。';
            $sql='update userdata a
                    SET id = (select count(b.id)+1 from userdata b
                    where b.id < a.id)';
            $pdo->query_run($sql);
        break;

        default:
            //パスワードチェック
            if(preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i',$_POST['newpass'])) {
                $newpass = password_hash(($_POST['newpass']),PASSWORD_DEFAULT);
            } else {
                echo 'パスワードは半角英数字を含んだ8文字以上で設定してください';
                return false;
            }
            $pdo->update($newpass);
            echo 'パスワードを変更しました。';
        //     $to = $_POST['email'];
        //     $subject = "パスワード変更";
        //     $message = "パスワード変更はこちら\r\nhttp:localhost:81/update.php";
        //     $headers = "From: test@test.com";
        //     mb_send_mail($to, $subject, $message, $headers);
        break;
    }    
}else {
    echo 'メールアドレスまたはパスワードが間違っています。';
    return false;
}











?>