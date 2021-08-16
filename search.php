<?php
$con = mysqli_connect('localhost' , 'root' , '' , 'novobanco') or die('Error'.mysqli_error()) ;
$s = filter_input( INPUT_POST,'busca' , FILTER_SANITIZE_STRING ) ;

$query = mysqli_query($con , "SELECT * FROM cadastro_cliente where email like '$s%'  ");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Busca</title>
	<style>

		label.sucess {
			color : green ;
			font-family: sans-serif;
			margin: 10px;
		}
		label.error {
			color : red ;
			font-family: sans-serif; 
			margin-top: 10px ;
		}
		.btn {
			padding: 8px ; 
			margin: 5px ;
			box-shadow: 2px 2px 2px black ; 
			border: none ; 
			background: blue ;
			color : white ;
			border-radius: 18px;
			font-size: 17px;
		}
		h1 {
			font-family: sans-serif; 
			padding: 4px ;

		}
		#search {
			font-family: sans-serif; 
			padding: 5px;
			font-size: 17px ;

			
		}
		input {
			
			margin: 11px;
		}
		.titulo {
			font-family:arial; 
		}
		body {
			background: black;
		}
		.box-form {
			position: relative;
			left: 10rem;
			background: white ;
			border:none ;
			padding: 10px ;
			margin: 10rem ;
			width: 40rem;
			border-radius: 90px;
		}
		.box-menu ul li  {display: inline ;}

		.box-menu ul li  {
			margin : 6px ;
			font-family: sans-serif;
			color : white ;
			font-size: 19px ;
		}

		.box-menu ul li a {
			text-decoration: none ;
			color : white ;
		}
		.box-menu ul :hover {
			color : blue ;
		}

		
	</style>
</head>
<body>
	<div class="box-menu">
		<ul>
			<li><a href='home.php'>Home</a></li>
			<li><a href='sobre.php'>Sobre</a></li>
			<li><a href='sair.php' >Sair</a></li>
			<li><a href='produtos.php'>Produtos</a></li>
			<li><a href='site.php' target="_blank">Cadastro de Email</a></li>
		</ul>
	</div>

	</div>
	<div class='box-form'>
	<center>
		<h1>Busca por Cliente</h1><br>
		<form action="" method="POST">
			<label class='titulo' >Busca por nome e Email do Cliente</label><br>
			<input type="text" name="busca" placeholder="Search" id='search'><br>
			<input class='btn' type="submit" name="search" value="Buscar">
		</form>
	
	
			<?php
			if(isset($_POST['search'])){

				$resultado = mysqli_fetch_array($query ) ;				
					
				
				if($resultado){
					foreach ($resultado as $key => $value) {
						# code...
						echo "<br><label class='sucess' >Email registrado em Nome de <strong>$value</strong>";
						echo "<br><label class='sucess'>Email ".$resultado['email'];
						break ;
					}
				}else{
					echo "<br><label class='error' >Email não Registrado <br>" ;
				}

				
			}
					
			
			?>
		</form>
</div>
</body>
</html>