<?php
//iniciar uma sessao - user
session_start(); 
if(!isset($_SESSION['user'])) {
    $_SESSION['user'] = '';
    $_SESSION['nome'] = '';
    $_SESSION['tipo'] = '';
}

function cripto($senha){ 
/*Funçao para criptografar a senha
o exemplo aqui utiliza a griptografia de CEZAR, substituiçao de uma  letra pela seguinte
 */
    $c =''; //string vazia para a senha
    for($pos=0;$pos< strlen($senha);$pos++){ //localizar as letras e substituir
        $letra = ord($senha[$pos])+1;
       $c.=chr($letra);
    }
    return $c;
}

function gerarHash($senha){
    $txt = cripto($senha);
    $hash = password_hash($txt, PASSWORD_DEFAULT); //gerar uma hash da palavra passe
    return $hash;
}

function testarHash($senha,$hash){
    $ok=password_verify($senha,$hash); //verificar se a senha colocada condiz com a hash
    return $ok;
}

?>