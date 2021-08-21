<?php
session_start() ;

	$localhost = 'localhost' ; 
	$dbname = 'cliente' ; 

	$db_username = 'root' ; 
	$db_password = '' ; 


	$name = filter_input( INPUT_POST, 'name' , FILTER_SANITIZE_STRING ) ;
	$password = filter_input(INPUT_POST , 'password' , FILTER_SANITIZE_STRING ) ;

	try {

		$con = mysqli_connect( $localhost , $db_username , $db_password , $dbname );
		$query = mysqli_query($con , 'SELECT  nome , senha , id FROM clienteuser ') ;
		
		
			while ($result = mysqli_fetch_array($query)) {
				# code...
				$nome = ($result['nome'] == $name)  ? $name : 'error '; 
				$senha = ($result['senha'] == $password) ? $password : 'error' ;

				if($nome == $name && $senha == $password ){

					$_SESSION['login'] = 'OK' ; 
					$_SESSION['id'] = $result['id'] ;
					
					$_SESSION['message'] = "<script>alert('Logado'); </script>" ;
					$_SESSION['nome_usuario'] = $name ; 

					echo $_SESSION['login'] ;

					break 1 ;

				} else {

					header('Location: index.php') ;

				}

					
		}	

		




	} catch (Exception $e) {
			echo $e->getMessage() ;
	}

if($_SESSION['login']){
	header('Location: filmes.php') ;
}