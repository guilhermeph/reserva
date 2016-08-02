<?php
require('session/session.php');
require('autoload.php');
require('persistencia/conecta.php');
require('cabecalho.php');
$agendamentoDAO = new AgendamentoDAO($conexao);
$schedules = $agendamentoDAO->listaAgendamentos();
$usuarioDAO = new UsuarioDAO($conexao);
$usuario = new Usuario;
$usuario->setId(usuarioLogado());

$usuarioAtual = $usuarioDAO->buscaAlteraUsuario($usuario);

//$usuarioAtual['nome'] == $schedule->getId_usuario()

?>

<div class="table-responsive">
  <table class="table">
     <thead>
		<tr>
			<th>Horário de começo</th>
			<th>Horário de termino</th>
			<th>Sala Agendada</th>
			<th>Responsável</th>
		</tr>
    </thead>
    <tbody>
<?php
	foreach ($schedules as $schedule) { ?>
	  	<tr>
			<th><?=$schedule->getHorario_inicio()?></th>
			<th><?=$schedule->getHorario_fim()?></th>
			<th><?=$schedule->getId_sala()?></th>
			<th><?=$schedule->getId_usuario()?></th>
			<?php
			if ($usuarioAtual['nome'] == $schedule->getId_usuario()) { ?>
			<th>
				<form action="deleta-agendamento.php" method="post">
					<input type="hidden" name="autentica" value="<?=usuarioLogado()?>">
					<input type="hidden" name="id" value="<?=$schedule->getId()?>">
					<button class="btn btn-danger">Desfazer</button>
				</form>
			</th>
			<?php } ?>
		</tr>
<?php	} ?>
	</tbody>   
  </table>
</div>