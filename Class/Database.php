<?php
Class Database{
    public $conn;

    public function __construct(){
        $this->conn=new mysqli('localhost','root','','brgy');        
        //$this->conn=new mysqli('mysql.kinalaglaganriver.site','kinalaglagan','kinalaglagan_2026','kinalaglagan');        
    }
}
?>