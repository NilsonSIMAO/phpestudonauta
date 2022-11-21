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
		
		function msg_sucesso($m){
			$resp = "<div class='sucesso'><span class='material-symbols-outlined'>
			check_circle
			</span> $m</div>";

			return $resp;
		}

		function msg_aviso($m){
			$resp = "<div class='aviso'><span class='material-symbols-outlined'>
			info
			</span> $m</div>";

			return $resp;
		}
		function msg_erro($m){
			$resp = "<div class='erro'><span class='material-symbols-outlined'>
			warning
			</span>$m</div>";

			return $resp;
		}
	?>
