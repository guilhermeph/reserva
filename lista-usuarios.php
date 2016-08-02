<?php
require('autoload.php');
require('persistencia/conecta.php');
require('cabecalho.php');
$usuarioDAO = new UsuarioDAO($conexao);

$users = $usuarioDAO->listaUsuarios();
?>

<div class="table-responsive">
  <table class="table">
     <thead>
		<tr>
			<th>Nome</th>
			<th>Username</th>
		</tr>
    </thead>
    <tbody>
<?php
	foreach ($users as $user) { ?>
	  	<tr>
			<th><?=$user->getNome()?></th>
			<th><?=$user->getUsername()?></th>
			<th><a href="form-altera-usuario.php?id=<?=$user->getId()?>"><button class="btn btn-primary">Alterar</button></a></th>
			<th>
				<form action="deleta-usuario.php" method="post">
					<input type="hidden" name="id" value="<?=$user->getId()?>">
					<button class="btn btn-danger">Excluir</button>
				</form>
			</th>
		</tr>
<?php	} ?>
	</tbody>   
  </table>
</div>