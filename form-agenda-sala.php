<?php
require ("cabecalho.php");
require ("autoload.php");
require ("persistencia/conecta.php");

$salaDAO = new SalaDAO($conexao);
$sala = new Sala;

$sala->setId($_GET['id']);

$result = $salaDAO->buscaSala($sala);
?>
<h1>Agendar Sala</h1>
    <form action = "agenda-sala.php" method = "post">
        <input type="hidden" name="id_sala" value="<?=$result['id']?>">
        <input type="hidden" name="id_usuario" value="<?=usuarioLogado()?>">
        <table class = "table">
            <tr>
                <td>Nome</td>
                <td><?=$result['nome']?></td>
            </tr>
            <tr>
                <td>Horário</td>
                <td><input type = "text" name = "horario" placeholder = "Ex: 2011-11-11 06:11"></td>
            </tr>
            <tr>
                <td><button class = "btn btn-primary">Agendar</button></td>
            </tr>
         </table>
    </form>