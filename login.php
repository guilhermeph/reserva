<?php
require ("autoload.php");
require ("persistencia/conecta.php");
require ("session/session.php");

$usuarioDAO = new UsuarioDAO($conexao);
$usuario = new Usuario;

$usuario->setUsername ($_POST["username"]);
$usuario->setPasswd ($_POST["passwd"]);

$resultado = $usuarioDAO->buscaUsuario($usuario);

if($resultado == null){
	$_SESSION["danger"] = "falha no login";
    header("Location: index.php");
}else{
	$_SESSION["success"] = "Logado com sucesso";
	logaUsuario($resultado["id"]);
    header("Location: index.php");
}
die();