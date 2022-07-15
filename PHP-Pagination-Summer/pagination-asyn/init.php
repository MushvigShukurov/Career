<?php 
require_once 'db.php';
$page = 0;
$data = $db->prepare("SELECT * FROM paginat LIMIT $page,10");
$data ->execute([]);
$list = $data->fetchAll(PDO::FETCH_ASSOC);
$SetirSayi = $db->query('SELECT count(*) from paginat')->fetchColumn(); 