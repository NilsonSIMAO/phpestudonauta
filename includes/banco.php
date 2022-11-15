<?php
	$banco = new mysqli("localhost", "root","", "bd_games"); 
	// objeto criado pra acessar o banco de dados com o metodo "mysqli"
	
		if($banco->connect_errno){
				echo "<p>Encontrei um erro $banco->errno --> 
				$banco->connect_error
				</p>";
				die(); // matar o processo 
		}
	//tratamento de possiveis erros ao se conectar ao banco de dados