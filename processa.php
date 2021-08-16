<?php 
session_start() ;


$nome = filter_input(INPUT_POST , 'name' , FILTER_SANITIZE_STRING ) ;
$email = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_EMAIL ) ;
$senha = filter_input(INPUT_POST, 'password' , FILTER_SANITIZE_STRING ) ;  

if(strlen($nome) > 3 OR strlen($email) > 3 OR strlen($senha) > 7){

	$conection = mysqli_connect('localhost' , 'root' , '' , 'novobanco' ) or die('Error :'.mysqli_error());
	$sql = "INSERT INTO cadastro_cliente(nome , senha , email) VALUES ('$nome' , '$senha' , '$email') " ; 
	$query = mysqli_query( $conection , $sql ) ;

	if($query){
		$_SESSION['mensagem']  =  "<script>alert('Cadastrado com Sucesso') ; </script>" ; 
		include('site.php') ;
		echo $_SESSION['mensagem'] ;
	}
}else {
	header('Location: site.php') ;
}

