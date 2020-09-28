<?php
require_once('config.php');

class Postgresql {
    private $email;
    //private $password;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function pdo() {
        try{
            $pdo = new PDO(dsn,user,pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch(PDOException $e) {
            echo 'Error:'.$e->getMessage();
            die();
        }

        return $pdo;
    }

    // public function connect(){
    //     try{
    //         $this->pdo = new PDO(dsn,user,pass);
    //     }catch(PDOException $e){
    //         print('Error:'.$e->getMessage());
    //         die();
    //     }
    // }

    public function select(){
        $pdo  = $this->pdo();
        $res  = $pdo->prepare('SELECT * FROM public.userdata WHERE email = :email');
        $res->execute(array(':email'=>$this->email));
        $row = $res->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function delete(){
        $pdo = $this->pdo();
        $res = $pdo->prepare('DELETE FROM public.userdata WHERE email = :email');
        $res -> execute(array(':email'=>$this->email));
        $rows = $res->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($password){
        $pdo = $this->pdo();
        $res = $pdo->prepare('INSERT INTO userdata(email,password) VALUES(:email,:pass)');
        $res -> execute(array(':email'=>$this->email,':pass'=>$password));
        $rows = $res->fetch(PDO::FETCH_ASSOC);
    }

    public function update($password){
        $pdo = $this->pdo();
        $res = $pdo->prepare('UPDATE userdata SET password = :pass WHERE email = :email');
        $res -> execute(array(':email'=>$this->email,':pass'=>$password));
        $rows = $res->fetch(PDO::FETCH_ASSOC);
    }

    public function query_run($sql){
        $pdo = $this->pdo();
        $pdo->query($sql);
    }

}

?>