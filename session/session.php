<?php
session_start();

function logaUsuario($type){
	$_SESSION["usuario_logado"] = $type;	
}

function usuarioEstaLogado() {
	return isset($_SESSION["usuario_logado"]);
}

function usuarioLogado(){
    return $_SESSION['usuario_logado'];
}

function mostraAlerta($tipo) {
	 if(isset($_SESSION[$tipo])) { ?>
	<p class="alert-<?= $tipo ?>"><?= $_SESSION[$tipo]?></p>
<?php
		unset($_SESSION[$tipo]);
	 }
 }