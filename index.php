<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estilos/estilo.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
	<title>Lista de jogos</title>
</head>

<body>
	<?php
		require_once "includes/banco.php";
		require_once  "includes/login.php";
		require_once "includes/functions.php";
		$ordem = $_GET['o'] ?? "n"; // variavel para os filtros
		$chave = $_GET['c'] ?? "";
	?>
	<div id="corpo">
	<?php include_once "topo.php";?>
	<h1>Escolha o seu jogo</h1>
	<?php echo msg_sucesso('Arquivo aberto com sucesso');
	 ?>
	
		<form method="get" id="busca" action="index.php" id="busca">
			<!--Criaçao dos filtros
				-> "o" é um parametro
				-> "n,p, n1 e n2" sao identificadores para cada filtro
			-->
		Ordenar:
			<a href="index.php?o=n&c=<?php echo $chave;?>"> Name</a>|
			<a href="index.php?o=p&c =<?php echo $chave;?>">Produtora</a> | 
			<a href="index.php?o=n1&c= <?php echo $chave;?>">Nota Alta</a> |
			<a href="index.php?o=n1&c= <?php echo $chave;?>">Nota Baixa</a>|
			<a href="index.php"> Mostrar tudo</a>|
			<br>
			Buscar: <input type="text" name="c" size="10" maxlength="40"/>
			<input type="submit" value="Ok">
		</form>
		<table class="listagem">
		<?php
			$q = "select j.cod, j.nome, g.genero,p.produtora, j.capa from jogos j join generos g on j.genero=g.cod
			join produtoras p on j.produtora=p.cod "; // trabalhando melhor a exibiçao com join(conectando tabelas)
			//verificaçao se o campo de pesquisa nao esta vazio
				if(!empty($chave)){
					$q.="WHERE j.nome like '%$chave%' OR p.produtora like '%$chave%' OR g.genero like '%$chave%'";
				} 
				
			//condiçoes para o filtro
			switch($ordem){
				case "p":
					$q .= "ORDER BY p.produtora";
					break;
				case "n1":
					$q.= "ORDER BY j.nota DESC";
					break;
				case "n2":
					$q.= "ORDER BY j.nota ASC";
					break;
				default:
					$q.="ORDER BY j.nome";
			}
			$busca = $banco ->query("$q"); // exibir todos os jogos cadastrados no banco de dados
			//tratamento dos erros 
			if(!$busca){
				echo"<p>Infelizmente a busca deu errado</p>";
			} else{
				if($busca->num_rows ==0){//num_rows nulero de linhas 
					echo "<tr><td> Nenhum registro encontrado";
				} else {
					while($reg=$busca->fetch_object()){
						$t = thumb($reg->capa);//funçao para imagem 
						echo"<tr><td><img src='$t' class='mini'/>";
						echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
						echo "[$reg->genero]";
						echo "<br/> $reg->produtora";
						echo "<td>Adm";
					}
				}
			}	
		?>
		</table>
	</div>
	<?php include_once "rodape.php";?>	
</body>
</html>