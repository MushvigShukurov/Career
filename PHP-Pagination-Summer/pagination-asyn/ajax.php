<?php 
require_once 'db.php';
if(isset($_POST['page'])){
	// echo "Burdasan dostuuum ;)";
	
	$page = $_POST['page'];
	$page--;
	$page = $page * 10;
	$data = $db->prepare("SELECT * FROM paginat LIMIT $page,10");
	$data ->execute([]);
	$list = $data->fetchAll(PDO::FETCH_ASSOC);	
}
foreach ($list as $value) { 
?>
    <tr>
      	<th scope="row"><?=$value['id']?></th>
      	<td><?=$value['first_name']?></td>
      	<td><?=$value['last_name']?></td>
    </tr>
<?php 
} 
?>