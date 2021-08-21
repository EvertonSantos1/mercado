<?php 
	
	class CONECTADB {
		private $nome ;
		private $dbname ; 
		private $password ; 
		private $server ;
		private $sql ;
		private $con ;
		public $query ;
		private $key ;
		private $inserir ;



		public function conecta($server , $nome , $password , $dbname){
			$this->server = $server ; 
			$this->nome = $nome ; 

			$this->password = $password ; 
			$this->dbname = $dbname ;

			try {
				$this->con = mysqli_connect($server , $nome , $password , $dbname );
			 	
			 } catch (Exception $e) {

			 	echo $e->getMessage() ;
			 	
			 }

		}
		public function consultarNomes($sql , $key = null){

			$this->sql = $sql ;
			$this->key= $key ; 

			$this->query  = mysqli_query($this->con , $sql) ;

			while($resultado = mysqli_fetch_array($this->query)){
				echo "<br><div id='nome'>".$resultado[$this->key].'</div><br>'; 
			}

		}
		public function inserirDados($sql) {
			$this->sql = $sql ;



			try {
				
			$this->inserir = mysqli_query($this->con , $sql) ;

			if($this->inserir){
				echo "<div class=\"message\">Mensagem Enviada Com Sucesso</div>";
			}

			} catch (Exception $e) {
				echo $e->getMessage() ;
			}
		}
		public function retornarMensagens($sql = null , $id = null , $nome = null , $mensagem = null ){

			$this->sql = $sql ;
			

			$this->query  = mysqli_query($this->con , $sql) ;

			while($resultado = mysqli_fetch_array($this->query)){
				echo "<div class=\"mensagens\">". $resultado[$id].' Nome '.$resultado[$nome] . ' Mensagem '.$resultado[$mensagem].'</div><br>'; 
			}
		}
	}