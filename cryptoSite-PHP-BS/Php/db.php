<?php 
session_start();
try{
    $user = 'root';
    $password = '';
    $dbname = 'tests';
    $db = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8",$user,$password);
}catch(PDOException $e){
    die($e->getMessage());
}