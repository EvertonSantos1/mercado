<?php
require_once('banco.php');
session_start() ; 


	if(!$_SESSION['login']) {

		header('Location: index.php') ;

	}else {

		echo $_SESSION['message'] ; 
		$_SESSION['message'] ='' ;
		
	}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Filmes</title>
	<meta charset="utf-8" /> 
	<link rel="stylesheet" type="text/css" href="page.css">

</head>
<body>

	 <h1><?php echo $_SESSION['nome_usuario'].'</strong>' ; ?></h1>

	 <div class="form">
		<form method="POST">
			<input class="button-exit" type="submit" name="sair" value="Sair">
		</form>
	</div>
	<?php if(isset($_POST['sair'])) { 
		session_unset() ;
		session_destroy();

		$_SESSION['login'] = false ;

		header('Location: index.php') ;
		exit();

	}

	?>

	<?php 
		if($_SESSION['id'] == 1){
			echo "
			<form action='' class='bloco-notas' method='POST'>
					<label class='label'>Texto</label> : <br><textarea height=500 name='mensagem' width=500px></textarea><br>
					<label class='label'>Nome <input class='nome' type='text' name='nome' >
					<input type='submit' name='salvar' value='Salvar texto'<br>
					<input type='submit' name='check' value='Usuarios Cadastrados'>	<br>
					<input type='submit' value='Mensagens' name='mensagens'>
			</form>
			" ; 

		}else {
			include('site.php') ;
		}

	?>
</body>
</html>

<?php

$db = new CONECTADB ; 
	$db->conecta('localhost' , 'root' , '' , 'cliente') ;

	if(isset($_POST['salvar'])){
		$nome = filter_input( INPUT_POST,'nome' , FILTER_SANITIZE_STRING ) ; 
		$texto = filter_input( INPUT_POST ,'texto' , FILTER_SANITIZE_STRING ) ; 

		$sobrenome = filter_input( INPUT_POST, 'texto' , FILTER_SANITIZE_STRING );
		$mensagem = filter_input( INPUT_POST, 'mensagem' , FILTER_SANITIZE_STRING );
		

		 

		

	}
	if(isset($_POST['check'])){
		$db->consultarNomes('SELECT * FROM clienteuser' , 'nome') ;
	}

if(isset($_POST['mensagens'])){
	$db->retornarMensagens('SELECT id , nome , mensagem FROM comentarios' , 'id' , 'nome' , 'mensagem');
}