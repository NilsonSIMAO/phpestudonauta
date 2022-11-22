<?php
echo "<header>";
if(empty($_SESSION['user'])) {
    echo "<a href='user-login.php'>Entrar</a>";
} else{
    echo "Ola, " .$_SESSION['nome'];
}
echo "</header>";
?>