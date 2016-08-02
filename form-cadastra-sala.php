<?php
require ("cabecalho.php");
?>
<h1>Cadastrar Sala</h1>
    <form action = "cadastra-sala.php" method = "post">
        <table class = "table">
            <tr>
                <td>Nome</td>
                <td><input type = "text" name = "nome"></td>
            </tr>
            <tr>
                <td><button class = "btn btn-primary">Cadastrar</button></td>
            </tr>
         </table>
    </form>