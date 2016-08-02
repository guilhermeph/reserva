<?php
require('session/session.php');
require('autoload.php');
require('persistencia/conecta.php');

$usuario = new Usuario;

$usuario->setId($_POST['id']);
$usuario->setNome($_POST['nome']);
$usuario->setUsername($_POST['username']);
$usuario->setPasswd($_POST['passwd']);

$usuarioDAO = new UsuarioDAO($conexao);

if ($usuarioDAO->alteraUsuario($usuario)) {
	$_SESSION["success"] = "Usuário {$usuario->getUsername()} Alterado com sucesso!";
	header("Location: index.php");
}else{
	$_SESSION["danger"] = "Erro ao alterar Usuário, contate o Mallmann";
	header("Location: index.php");
}