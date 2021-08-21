<?php 
session_start() ;

	if(isset($_SESSION['login'])){
		header('Location: filmes.php') ;

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Entrar</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="short icon " href="img/user-2160923_640.png">
</head>
<body>

	<div class="form">
		<h1>LOGIN</h1>
		<form action="action.php" method="POST">
				<label>Nome</label>
					 <input type="text" id="name" name="name"><br>
				<label>Senha </label>
					<input type="text" id="password" name="password">

			<div class="box-button">
				<input class="submit" id="button" type="submit" name="button">
			</div>

			<div class="link">
				<a href="cadastrar.php" target="_blank">Cadastrar</a>
			</div>
		</form>
	</div>
</body>
</html>

