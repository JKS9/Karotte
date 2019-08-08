<?php
class connect {

    protected $_connect;

    protected function __construct($connect)
    {
        $this -> setConnect($connect);
    }


    public function setConnect(PDO $connect)
    {
        $this -> _connect = $connect;
    }
}
?>