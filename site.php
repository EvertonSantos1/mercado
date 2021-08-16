<!DOCTYPE html>
<html>
<head>
	<title>Usuario</title>
	<link rel="stylesheet" href="css/site.css">
	<style>
		.form-input {
			font-family: sans-serif; 
			text-align: center;

		}
		#button {
			margin-top:10px;
			font-size: 18px;
			background:#DCDCDC ;
			border : none ;
			color : black ;
			border-radius: 10px;
			padding: 6px;

		}
		h1 {
			text-align: center ;
			font-family: sans-serif; 

		}
		body {
			background:	#FFFAFA;
		}
		.form-input {
			border:none ;
			outline:none;
		}
		#button:hover {
			color : white ;
			background:	#696969;
		}
		.form-input input {
				margin:12px;
				border:none;
				background: none;
				border-bottom: 1px solid #708090;
		}

	</style>
</head>
<body>
<header>
		<h1>Cadastro</h1>
		<form name='form' action="<?php echo 'processa.php' ; ?>" method="POST">
			<div class="form-input">
				<label>Nome : </label><input class='container-input' type="text" name="name"><br>
				<label>Senha : </label><input class="container-input2" type="text"  name="password"><br>
				<label>Email : </label><input type="text" name="email"><br>
				<input type="submit" id='button' name="button" value="Enviar">
			</div>
		</form>

</header>
<section>
		<a id='search_client' href='#' >Busca dos Clientes</a>

</section>
<script type="text/javascript" src="javascript/script.js"></script>
<script>

	const search = document.getElementById('search_client') 
	search.addEventListener('click' , () => {
		var open = window.open('search.php' , "pictures" , "width=1000 , height=500")
		open.resizeto(200 ,200)
	})


</script>
</body>
</html>
