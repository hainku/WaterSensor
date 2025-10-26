<?php
Class Session{
    public function __construct(){
        if(!isset($_SESSION['role'])){
            header('location:index.php');
        }
    }
}
?>