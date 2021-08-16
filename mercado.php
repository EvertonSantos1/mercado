
<!DOCTYPE html>
<head>
	<title>Registradora de Mercado</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="css/style.css">
	<link rel="short icon" href="img/caixa-registradora.png">
</head>
<body>
	<form action="" method="POST">
		<label> Nome do Produto </label>
		<input type="text" class='form-principal' placeholder="Produto" name="produto_nome"><br>
		<label> Preco </label><input placeholder='Preco' type="text" class="form-principal" name="preco"><br>
		<input type="submit" id='button' name="button" value="Registrar">
		<input type="submit"id='button2' name="total_produtos" value="Total">
	</form>
	<img src="img/caixa-registradora.png" height="200" width="200">
</body>
</html>

<?php
	if(isset($_POST['button'])){

		$nome_produto = filter_input(INPUT_POST, 'produto_nome' , FILTER_SANITIZE_STRING );
		$preco = filter_input(INPUT_POST, 'preco' , FILTER_SANITIZE_STRING ) ; 

		if($preco == null or $nome_produto == null){
			echo "<script>alert('Por favor Preencha o Nome ou Preço do Produto') ; </script>" ;
		 } else {
			$server = 'localhost' ; 
			$db_username = 'root' ; 
			$db_password = '' ; 
			$database = 'caixa_registradora_padaria' ;

			try {

				$con = mysqli_connect($server , $db_username , $db_password , $database);
				$sql = "INSERT INTO registro_produto(nome_produto , preco , dia_registro) VALUES ('$nome_produto' , '$preco' , NOW())" ; 
				$query = mysqli_query($con , $sql ) ; 
				if(!$query) echo "<script>alert('Error Na consulta'); </script>" ;


			} catch (Exception $e) {
				echo $e->getMessage() ;
			}

		}

		
	}
	if(isset($_POST['total_produtos'])){
			$server = 'localhost' ; 
			$db_username = 'root' ; 
			$db_password = '' ; 
			$database = 'caixa_registradora_padaria' ;

			try {

				$con = mysqli_connect($server , $db_username , $db_password , $database);
				$sql = "SELECT SUM(preco) as total  FROM registro_produto " ; 
				$query = mysqli_query($con , $sql ) ; 
				if(!$query) echo "<script>alert('Error no Servidor'); </script>" ;

				while($total = mysqli_fetch_array($query)){
					$result = substr($total['total'] , 0 , 5) ;
					echo "<div class='total-result'> R$ $result Total</div><br>" ;
					
				}


			} catch (Exception $e) {
				echo 'Error 3 '.$e->getMessage() ;
			}
	}