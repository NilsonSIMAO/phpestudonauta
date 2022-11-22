<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Detalhes</title>
</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once  "includes/login.php";
        require_once "includes/functions.php"
    ?>
     
    <div id="corpo">
        <?php
             include_once "topo.php";
            $c = $_GET['cod'] ?? 0; // teste do codigo da url, ou seja o valor de cod
            $busca = $banco->query("select*from jogos where cod='$c'");
        ?>
        <h1>Detalhes do jogo</h1>
        <table class="detalhes">
           <?php
                if(!$busca){
                    echo "Busca falhou!!!!";
                } else{
                    if($busca->num_rows == 1){
                        $reg = $busca->fetch_object();
                        $t = thumb($reg->capa);
                        echo "<tr><td rowspan='3'><img src='$t' class='full'>";
                        echo "<td><h2>$reg->nome</h2>";
                        echo   "Nota: $reg->nota";
                        echo "<tr><td>$reg->descricao";
                        echo "<tr><td>Adm";
                    } else{
                        echo "<h1>Nenhum registro encontrado</h1>";
                    }
                }
           ?>
        </table>
        <a href="index.php"><span class="material-symbols-outlined">arrow_back</span></a>
    </div>
    
</body>
<?php include_once "rodape.php"; ?>
</html>