<?php
require('autoload.php');
require('persistencia/conecta.php');
require('session/session.php');


if (usuarioLogado() == $_POST['autentica']) {
	$agendamento = new Agendamento;
	$agendamentoDAO = new AgendamentoDAO($conexao);
	$agendamento->setId($_POST['id']);

	$usuario = new Usuario;
	$usuario->setId($_POST['autentica']);

	if ($agendamentoDAO->deletaAgendamento($agendamento, $usuario)) {
		$_SESSION["success"] = "Agendamento deletado com sucesso";
	    header("Location: lista-agendamentos.php");
	}else{
		$_SESSION["danger"] = "Falha ao deletar agendamento, contate o Mallmann";
	    header("Location: lista-agendamentos.php");
	}
} else{
	$_SESSION["danger"] = "Hacker de merda, vai tomar ban";
    header("Location: lista-agendamentos.php");
}

