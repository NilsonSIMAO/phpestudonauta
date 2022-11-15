<?php
	/**
	 * Funçao para mostrar a foto a partir do servidor
	 * Dois casos possiveis:
	 * 1: foto existe -> mostra a foto em questao
	 * 2: foto nao existe -> mostra a foto indisponivel
	 */
		function thumb($arq){
			$caminho = "fotos/$arq";
			if(is_null($arq) || !file_exists($caminho)){
				return "fotos/indisponivel.png";
			} else{
				return $caminho;
			}
		}
	?>
