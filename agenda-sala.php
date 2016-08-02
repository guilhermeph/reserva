<?php
require('session/session.php');
require('autoload.php');
require('persistencia/conecta.php');

if (usuarioLogado() == $_POST['id_usuario']) {
	$dataregex = '/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}$/';

	if (preg_match($dataregex, $_POST['horario'])) {
		$sala = new Sala;
		$sala->setId($_POST['id_sala']);


		$usuario = new Usuario;
		$usuario->setId($_POST['id_usuario']);

		$agendamento = new Agendamento;

		$horario_fim = new DateTime($_POST['horario']);
		$horario_fim->modify('+1 hour');
		$horario_fim = date_format($horario_fim, 'Y-m-d H:i:s');

		$agendamento->setHorario_inicio($_POST['horario']);
		$agendamento->setHorario_fim($horario_fim);

		$agendamentoDAO = new AgendamentoDAO($conexao);


		if ($agendamentoDAO->agendaSala($sala, $usuario, $agendamento)) {
			$_SESSION["success"] = "Sala {$sala->getNome()} agendada com sucesso para a data {$agendamento->getHorario_inicio()} com o termino para {$agendamento->getHorario_fim()}!";
			header("Location: lista-salas.php");
		}else{
			$_SESSION["danger"] = 'Sala indisponível no momento';
			header("Location: lista-salas.php");
		}
	}else{
		$_SESSION["danger"] = 'Data inválida';
		header("Location: lista-salas.php");
	}
}else{
	$_SESSION["danger"] = "Hacker de merda, vai tomar ban";
    header("Location: lista-salas.php");
}
