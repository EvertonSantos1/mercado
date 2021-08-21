<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<meta charset="utf-8" />
	<link rel="short icon " href="img/user-2160923_640.png">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<div class="form">
		<h1>Cadastro</h1>
		<form  method="POST">
				<label>Nome</label>
					 <input type="text" id="name" name="name"><br>
				<label>Senha </label>
					<input type="text" id="password" name="password">

			<div class="box-button">
				<input class="submit" id="button" type="submit" name="button" value="Cadastrar">
			</div>
		</form>
	</div>

</body>
</html>

<?php 
	if(isset($_POST['button'])){

		$name = filter_input( INPUT_POST , 'name' , FILTER_SANITIZE_STRING ) ; 
		$password = filter_input( INPUT_POST , 'password' , FILTER_SANITIZE_STRING ) ;


		try {	
			$con = mysqli_connect('localhost' , 'root' , '' , 'cliente') ; 
			$query = mysqli_query($con , "INSERT INTO clienteUser(id,nome ,senha) VALUES ('0', '$name' , '$password')") ;
			
			if($query){
				echo "<script>alert('Cadastro Concluido') ; </script>" ;
			}
			
		} catch (Exception $e) {

			echo $e->getMessage() ;

		}
	}