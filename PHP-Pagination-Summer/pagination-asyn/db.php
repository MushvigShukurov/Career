<?php

try{
	$dbname = 'test';
	$user = 'root';
	$pass = '';
	$db = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8",$user,$pass);
} catch (PDOException $e){
	die($e->getMessage());
}