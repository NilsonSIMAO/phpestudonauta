<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Login do usuario</title>
    <style>
        div#corpo{
            width: 270px;
            font-size: 15pt;
        }
        td{
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once  "includes/login.php";
        require_once "includes/functions.php"
    ?>
     
    <div id="corpo">
        <?php
            $user = $_POST['usuario']??null;
            $senha = $_POST['senha']??null;
            if(is_null($user) || is_null($senha)){
                require "user-login-form.php";
            } else {
                echo "Dados foram passados";
            }
        ?>
    </div>
</body>
</html>