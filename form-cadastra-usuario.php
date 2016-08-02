<?php
require ("cabecalho.php");
?>
<h1>Cadastrar Usuario</h1>
    <form action = "cadastra-usuario.php" method = "post">
        <table class = "table">
            <tr>
                <td>Nome</td>
                <td><input type = "text" name = "nome"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type = "text" name = "username"></td>
            </tr>
            <tr>
                <td>Senha</td>
                <td><input type = "password" name = "passwd"></td>
            </tr>
            <tr>
                <td><button class = "btn btn-primary">Cadastrar</button></td>
            </tr>
         </table>
    </form>