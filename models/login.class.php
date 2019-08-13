<?php
class Login extends connect {

    function __construct($connect)
    {
        parent::__construct($connect);
    }

    public function login($email,$password)
    {
        $errorBan = "Your account has been disabled by an adminatrator";
        $errorMatch = "Email, Password or account invalide";

        $status = "";
        $type = "";
        $id = "";

        $req = $this->_connect->query("SELECT * FROM Users WHERE Email = '$email' AND Password = '$password' AND Actif='0'");
        $nb = $req -> rowCount();

        if($nb == 0){
            return $errorMatch;
        }
        $res = $req -> fetchAll();
        foreach ($res as $r){
            $status = $r['Status'];
            $type = $r['Type'];
            $id = $r['Id'];
        }

        if($status == 0){
            return $errorBan;
        }

        if($type == 1){
            $_SESSION['user'] = $id;
            header('location: Products/1');
        }else if($type == 2){
            $_SESSION['farmer'] = $id;
            header('location: Products/1');
        }
    }
}
?>