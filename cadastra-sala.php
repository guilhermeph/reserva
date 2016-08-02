<?php
require('session/session.php');
require('autoload.php');
require('persistencia/conecta.php');

$sala = new Sala;

$sala->setNome($_POST['nome']);

$salaDAO = new SalaDAO($conexao);

if ($salaDAO->cadastraSala($sala)) {
	$_SESSION["success"] = "Sala {$sala->getNome()} Cadastrada com sucesso!";
	header("Location: index.php");
}else{
	$_SESSION["danger"] = "Erro ao cadastrar Sala, contate o Mallmann";
	header("Location: index.php");
}