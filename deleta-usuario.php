<?php 
require('autoload.php');
require('persistencia/conecta.php');
require('session/session.php');

$usuario = new Usuario;
$usuarioDAO = new UsuarioDAO($conexao);
$usuario->setId($_POST['id']);

if ($usuarioDAO->deletaUsuario($usuario)) {
	$_SESSION["success"] = "Usuário deletado com sucesso";
    header("Location: lista-usuarios.php");
}else{
	$_SESSION["danger"] = "Falha ao deletar usuário, contate o Mallmann";
    header("Location: lista-usuarios.php");
}