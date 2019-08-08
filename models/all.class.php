<?php
class all extends connect
{

    function __construct($connect)
    {
        parent::__construct($connect);
    }

    public function homeStateUserSignUpDay(){
        $date = date("Y-m-d");
        $req = $this -> _connect -> query("SELECT * FROM Users WHERE `Type` = 1 AND `CreationDate` = '$date'");
        $nb = $req -> rowCount();
        return $nb;
    }

    public function homeStateUserCommande(){
        $date = date("Y-m-d");
        $req = $this -> _connect -> query("SELECT * FROM Commande WHERE `Status` = 2 AND `CreationDate` = '$date'");
        $nb = $req -> rowCount();
        return $nb;
    }

    public function homeStateFarmerSignUpDay(){
        $date = date("Y-m-d");
        $req = $this -> _connect -> query("SELECT * FROM Users WHERE `Type` = 2 AND `CreationDate` = '$date'");
        $nb = $req -> rowCount();
        return $nb;
    }

    public function homeStateFarmersProductsDay(){
        $date = date("Y-m-d");
        $req = $this -> _connect -> query("SELECT * FROM Produit WHERE `CreationDate` = '$date'");
        $nb = $req -> rowCount();
        return $nb;
    }

    public function menucardsIconeNb($sessionId){
        $req = $this -> _connect -> query("SELECT * FROM Cards WHERE Idusers= '$sessionId' AND Status = 0");
        $nb = $req -> rowCount();
        return $nb;
    }

}

?>