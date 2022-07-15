<?php 
require_once 'init.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagination</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		body{
			background: #000;
			color: #fff;
			width: 100%;
			min-height: 100vh;
		}
		.data{
			max-width: 1100px;
			margin: 0 auto;
			margin-top: 30px;
		}
		h1{
			text-align: center;
			padding: 15px 0;
		}
		.nav-div{
			width: 100%;
			height: auto;
			display: flex;
			flex-direction: row;
			justify-content: center;
			align-items: center;
		}
		nav a{
			color: #000;
		}
		a{
			color: inherit;
		}
		.btn1,.btn2{
			outline: none;
			width: 50px;
			height: auto;
			background: transparent;
			border-radius: 3px;
			border: 1px solid #fff;
			color: rgb(13,110,254);
			font-size: 18px;
		}
		input[name=sabitlendi]{
			outline: none;
			width: 100px;height: auto;
			background: transparent;
			border-radius: 3px;
			border: 1px solid #fff;
			color: rgb(13,110,254);
			font-size: 18px;
			text-align: center;

		}
	</style>
</head>
<body>

<div class="data">
	<h1>Pagination / mushvi9</h1>
<table class="table table-striped table-hover table-light">
 
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">AD</th>
      <th scope="col">E-MAIL</th>
    </tr>
  </thead>
  <tbody class="tbody">
  	<?php foreach ($list as $value) { ?>
    	<tr>
      		<th scope="row"><?=$value['id']?></th>
      		<td><?=$value['first_name']?></td>
      		<td><?=$value['last_name']?></td>
    	</tr>
	<?php } ?>
  </tbody>

</table>
<div class="nav-div">
<nav aria-label="Page navigation example">
	
  <button class="btn1"><i class="fas fa-long-arrow-alt-left"></i></button>
  <input type="text" name="sabitlendi" disabled="true" value="1">
  <button class="btn2"><i class="fas fa-long-arrow-alt-right"></i></button>
  <input type="hidden" name="HsSay" value="<?php echo $SetirSayi; ?>">
</nav>
</div>
</div>



<script>
	$(function(){
		$("#pageSelect").change(function(){
			$value = $(this).val();

			$data  = {
				page:$value
			}
			$.post('http://localhost/paginat/ajax.php',$data,function(response){
				$('.tbody').html(response);
			});
		});


		$('.btn1').click(function(){
			$value = $('input[name=sabitlendi]').val();
			if($value<1){
				$value = 1;
			}
			if($value>1){
				$value--;
			}
			$data  = {
				page:$value
			}
			$.post('http://localhost/paginat/ajax.php',$data,function(response){
				$('.tbody').html(response);
			});
			if($value==0){
				$value = 1;
			}
			$('input[name=sabitlendi]').val($value);
		});



		$('.btn2').click(function(){
			$value = $('input[name=sabitlendi]').val();
			$setirSayi = $('input[type=hidden]').val();
			$pageSayi = $setirSayi / 10;
			$value++;
			if($value>$pageSayi){
				$value = 1;
			}
			
			
			$data  = {
				page:$value
			}
			$.post('http://localhost/paginat/ajax.php',$data,function(response){
				$('.tbody').html(response);
			});
			$('input[name=sabitlendi]').val($value);
		});
	});
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>