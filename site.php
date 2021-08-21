

	<form action="" method="POST">
		<p>Mensagem</p><br><textarea name="mensagem"></textarea><br>
		
		<input type="submit" name="comentario" value="Enviar">
	</form>
	<?php if (isset($_POST['comentario'])){

		if($_POST['mensagem'] == null or strlen($_POST['mensagem']) < 1){
			echo "<script>alert(\"Tamanho insuficiente\") ; </script>" ;
		}else{
			$nome = $_SESSION['nome_usuario']; 
		$mensagem = filter_input( INPUT_POST , 'mensagem' , FILTER_SANITIZE_STRING ) ;
		$idUser = $_SESSION['id'] ;

		require_once('banco.php') ;

		$db = new CONECTADB() ; 
		$db->conecta('localhost' , 'root' , '' , 'cliente');
		$db->inserirDados("INSERT INTO comentarios(id , nome , mensagem ) VALUES ('$idUser' ,'$nome'  , '$mensagem');");
		}
	}
