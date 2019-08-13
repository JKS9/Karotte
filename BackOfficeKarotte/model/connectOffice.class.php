<?php
class connectOffice {
    protected $_connectOffice;
    protected function __construct($connectOffice)
    {
        $this -> setConnect($connectOffice);
    }
    public function setConnect(PDO $connectOffice)
    {
        $this -> _connectOffice = $connectOffice;
    }
}
?>