<?php
require('autoload.php');
require('persistencia/conecta.php');
require('cabecalho.php');
$salaDAO = new SalaDAO($conexao);

$roms = $salaDAO->listasalas();
?>

<div class="table-responsive">
  <table class="table">
     <thead>
		<tr>
			<th>Nome</th>
			<th>romname</th>
		</tr>
    </thead>
    <tbody>
<?php
	foreach ($roms as $rom) { ?>
	  	<tr>
			<th><?=$rom->getNome()?></th>
			<th><a href="form-agenda-sala.php?id=<?=$rom->getId()?>"><button class="btn btn-primary">Agendar</button></a></th>
			
			<?php 
			if (usuarioLogado() == 1) { ?>
				<th>
					<form action="deleta-sala.php" method="post">
						<input type="hidden" name="id" value="<?=$rom->getId()?>">
						<button class="btn btn-danger">Excluir</button>
					</form>
				</th>
			<?php } ?>
				
		</tr>
<?php	} ?>
	</tbody>   
  </table>
</div>