<?php
require ("cabecalho.php");
require ("autoload.php");
require ("persistencia/conecta.php");

$usuarioDAO = new UsuarioDAO($conexao);
$usuario = new Usuario;

$usuario->setId($_GET['id']);

$result = $usuarioDAO->buscaAlteraUsuario($usuario);
?>
<h1>Alterar Usuario</h1>
    <form action = "altera-usuario.php" method = "post">
        <input type="hidden" name="id" value="<?=$result['id']?>">
        <table class = "table">
            <tr>
                <td>Nome</td>
                <td><input type = "text" name = "nome" value="<?=$result['nome']?>"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type = "text" name = "username" value="<?=$result['username']?>"></td>
            </tr>
            <tr>
                <td>Senha</td>
                <td><input type = "password" name = "passwd"></td>
            </tr>
            <tr>
                <td><button class = "btn btn-primary">Alterar</button></td>
            </tr>
         </table>
    </form>